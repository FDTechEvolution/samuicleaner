<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * AccountMemos Controller
 *
 * @property \App\Model\Table\AccountMemosTable $AccountMemos
 *
 * @method \App\Model\Entity\AccountMemo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeliveriesController extends AppController {

    public $Connection = null;
    public $Products = null;
    public $Shippings = null;
    public $PrintingSets = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);


        $this->Connection = ConnectionManager::get('default');
        $this->loadComponent('Util');
        $this->loadComponent('Sales2');
        $this->loadComponent('ReadSqlFiles');
        $this->loadComponent('Order');
        $this->Products = TableRegistry::get('Products');

    }

    public function index(){
        $sql = 'select p.name,p.id from orders o join order_lines line on o.id = line.order_id join products p on line.product_id = p.id where o.status IN ("CF","VCF") and o.org_id = :org_id group by p.name,p.id order by count(o.id) DESC ';

        $products = $this->Connection->execute($sql, ['org_id'=>$this->Client->getOrgId()])->fetchAll('assoc');

        $sql = $this->ReadSqlFiles->read('delivery_product_category_option.sql');
        $productCategoryOptions = $this->Connection->execute($sql, ['org_id'=>$this->Client->getOrgId()])->fetchAll('assoc');

        /*
        $sql = "select DATE_FORMAT(print_date,'%d/%m/%Y') as print_date,shipping_stamp,count(id) as amt from orders where status = 'WS' and org_id = :org_id and shipping_stamp is not null group by shipping_stamp,print_date order by print_date desc limit 30";
        $histories = $this->Connection->execute($sql, ['org_id'=>$this->Client->getOrgId()])->fetchAll('assoc');
        */

        $sql = $this->ReadSqlFiles->read('delivery_printing_history.sql');
        $printingSets = $this->Connection->execute($sql, ['org_id'=>$this->Client->getOrgId()])->fetchAll('assoc');



        $search = $this->request->getQuery('search');

        if(!is_null($search)){
            $type = strtoupper($this->request->getQuery('type'));
            $shippingId = $this->request->getQuery('shipping');

            $this->Shippings = TableRegistry::get('Shippings');
            $shipping = $this->Shippings->get($shippingId);

            $paymentmethod = $this->request->getQuery('paymentmethod');
            //$product = $this->request->getQuery('product');
            $product = ($this->request->getQuery('product'));
            $productCategorieId = ($this->request->getQuery('product_category'));

            $limitOrder = ($this->request->getQuery('limit'));
            if(!is_numeric($limitOrder)){
                $limitOrder = 0;
            }

            $orders = $this->getOrder($shipping->id,$paymentmethod,$product,$type,$productCategorieId,$limitOrder);

            $this->set(compact('search','orders','shipping','paymentmethod','product','type'));
        }

        $shippingOpt = $this->Sales2->getShippingOpt();

        $this->set('pageTitle','สร้างการจัดส่งเพื่อปริ้นที่อยู่');
        $this->set(compact('products','printingSets','shippingOpt','productCategoryOptions'));

    }

    public function history(){

        $sql = $this->ReadSqlFiles->read('delivery_printing_history.sql');
        $printingSets = $this->Connection->execute($sql, ['org_id'=>$this->Client->getOrgId()])->fetchAll('assoc');

        $this->set(compact('printingSets'));
    }

    public function save(){
        $shippingId = $this->request->getQuery('shipping');
        $paymentmethod = $this->request->getQuery('paymentmethod');
        $product = ($this->request->getQuery('product'));
        $type = strtoupper($this->request->getQuery('type'));

        $date = new Date();
        $todayDate = $date->format('Y-m-d');

        //$this->log($product,'debug');

        

        if(!is_null($shippingId)){
            $this->loadComponent('DocumentNo');
            $this->PrintingSets = TableRegistry::get('PrintingSets');
            

            $this->Shippings = TableRegistry::get('Shippings');
            $shipping = $this->Shippings->find()->where(['Shippings.id'=>$shippingId])->first();

            $orders = $this->getOrder($shipping->id,$paymentmethod,$product,$type);

            $shippingStamp = $this->DocumentNo->generate($shipping->code);

            $countSuccess = 0;

            //Create print set
            $printingSet = $this->PrintingSets->newEntity();
            $user = $this->Client->getUser();
            $printingSetData = [
                'user_id'=>$user['id'],
                'shipping_id'=>$shippingId,
                'status'=>'CF',
                'org_id'=>$this->Client->getOrgId()
            ];
            $printingSet = $this->PrintingSets->patchEntity($printingSet,$printingSetData);

            if($this->PrintingSets->save($printingSet)){
                $printSetId = $printingSet->id;

                $this->Connection->begin();
                foreach($orders as $index=>$order){
                    $this->Connection->execute('UPDATE orders SET status = ?,shipping_stamp=?,print_date=?,modified=now(),printing_set_id=? WHERE id = ?', ['WS', $shippingStamp, $todayDate,$printSetId,$order['id']]);

                    $countSuccess++;
                }
                $this->Connection->commit();
            }


            

            $this->Flash->success(__('ย้าย '.number_format($countSuccess).' ออเดอร์ จาก สถานะยืนยันแล้วไปยังเตรียมส่ง เรียบร้อยแล้ว'));
        }

        return $this->redirect(['controller'=>'deliveries']);

    }

    public function printingSet($printingSetId = null){
        if(is_null($printingSetId) || $printingSetId == ''){
            return $this->redirect(['controller'=>'deliveries','action'=>'index']);
        }

        $this->PrintingSets = TableRegistry::get('PrintingSets');
        $printingSet = $this->PrintingSets->find()
                        ->contain([
                                'Orders'=>['Customers'],
                                'Users',
                                'Shippings'])
                        ->where(['PrintingSets.id'=>$printingSetId])
                        ->first();
        $orderStatus = $this->Order->getListStatus();
        $this->set(compact('printingSet','orderStatus'));

    }

    public function export($printingSetId = null){
        $this->PrintingSets = TableRegistry::get('PrintingSets');
        $printingSet = $this->PrintingSets->find()
                            ->contain(['Shippings'])
                            ->where(['PrintingSets.id'=>$printingSetId])
                            ->first();
        $shipping = $printingSet->shipping;

        $sql = 'select o.id,c.fullname,o.payment_method,o.totalamt,o.order_line_code,s.name as shipping,o.ordercode,u.name,'
                . 'c.mobile,c.mobile2,c.address_line1,c.subdistrict,c.district,c.province,c.zipcode,o.order_line_des,o.id,p.cost_kerry, '
                . '(line.weight) as weight,COALESCE(DATE_FORMAT(o.duedate,"%d/%m/%Y"),"") as duedate '
                . 'from printing_sets ps join orders o on ps.id = o.printing_set_id '
                . 'left join customers c on o.customer_id = c.id '
                . 'left join users u on o.user_id = u.id '
                . 'left join provinces p on c.province = p.name ' 
                . 'left join shippings s on o.shipping_id = s.id '
                . 'left join (select line.order_id,sum(p.weight)*sum(line.qty) as weight,sum(line.qty) as qty from order_lines line join products p on line.product_id = p.id group by line.order_id) as line on o.id = line.order_id '
                . ' where ps.id = :printing_set_id '
                . ' order by o.order_line_code ASC,o.payment_method ASC,c.fullname ASC';

        $orders = $this->Connection->execute($sql, ['printing_set_id'=>$printingSetId])->fetchAll('assoc');

            $this->set(compact('search','orders','shipping','paymentmethod','product','type'));


    }

    public function detail(){
        $shippingStamp = $this->request->getQuery('shipping_stamp');
        if(!is_null($shippingStamp)){
            $sql = 'select o.id,c.fullname,o.payment_method,o.totalamt,o.order_line_code,s.name as shipping,o.ordercode,u.name,'
                . 'c.mobile,c.mobile2,c.address_line1,c.subdistrict,c.district,c.province,c.zipcode,o.order_line_des,o.id,p.cost_kerry, '
                . '(line.weight) as weight '
                . 'from orders o '
                . 'left join customers c on o.customer_id = c.id '
                . 'left join users u on o.user_id = u.id '
                . 'left join shippings s on o.shipping_id = s.id '
                . 'left join provinces p on c.province = p.name '
                . 'left join (select line.order_id,sum(p.weight)*sum(line.qty) as weight,sum(line.qty) as qty from order_lines line join products p on line.product_id = p.id group by line.order_id) as line on o.id = line.order_id '
                . ' where o.status ="WS" and o.shipping_stamp = :shipping_stamp ' 
                . ' order by o.order_line_code ASC,o.payment_method ASC,c.fullname ASC';

            $orders = $this->Connection->execute($sql, ['shipping_stamp'=>$shippingStamp])->fetchAll('assoc');

            $this->set(compact('orders','shippingStamp'));

        }else{
            return $this->redirect(['action'=>'index']);
        }
    }

    public function void(){
        $shippingStamp = $this->request->getQuery('shipping_stamp');
        if(!is_null($shippingStamp) && $shippingStamp != ''){

            $this->Connection->begin();
            $this->Connection->execute('UPDATE orders SET status = ?,shipping_stamp=null,modified = now() WHERE shipping_stamp = ?', ['CF', $shippingStamp]);
            $this->Connection->commit();
            $this->Flash->success(__('The order has been saved.'));
            return $this->redirect(['action'=>'index']);
            
        }
    }

    private function getOrder($shippingId,$paymentmethod,$product,$type='NORMAL',$productCategorieId = 'all',$limit = 0 ) {
       // $product = $this->Util->_rawurlencode($product);
       //$shipping = $this->Util->_rawurlencode($shipping);
       // $paymentmethod = $this->Util->_rawurlencode($paymentmethod);

        
        $condition = '';
        if($paymentmethod != 'all' && !is_null($paymentmethod)){
            $condition.= sprintf(' and o.payment_method = "%s" ',$paymentmethod);
        }



        if($product != 'all' && !is_null($product)){
            $product = $this->Products->find()->where(['Products.id'=>$product])->first();
            $productName = 'XX';

            if(!is_null($product)){
                $productName = $product->name;
            }
            $condition.= (' and o.order_line_des like "%'.$productName.'%" ');
        }

        $limitSql = '';
        if($limit !=0){
             $limitSql = ' limit '.$limit.' ';
        }



        $sql = 'select * '
                . 'from ( '
                . 'select o.id,c.fullname,o.payment_method,o.totalamt,o.order_line_code,s.name as shipping,o.ordercode,u.name,'
                . 'c.mobile,c.mobile2,c.address_line1,c.subdistrict,c.district,c.province,c.zipcode,o.order_line_des,p.cost_kerry, '
                . '(line.weight) as weight,COALESCE(DATE_FORMAT(o.duedate,"%d/%m/%Y"),"") as duedate '
                . 'from orders o '
                . 'left join customers c on o.customer_id = c.id '
                . 'left join users u on o.user_id = u.id '
                . 'left join provinces p on c.province = p.name ' 
                . 'left join shippings s on o.shipping_id = s.id '
                . 'left join (select line.order_id,sum(p.weight)*sum(line.qty) as weight,sum(line.qty) as qty from order_lines line join products p on line.product_id = p.id group by line.order_id) as line on o.id = line.order_id '
                . ' where o.status IN ("CF","VCF") and o.isspecialcase in("N") and o.type = :type and o.shipping_id = :shipping_id '.$condition 
                . 'order by o.created ASC '.$limitSql 
                . ') as main '
                . ' order by order_line_code ASC,payment_method ASC,fullname ASC';

        $orders = $this->Connection->execute($sql, ['type'=>$type,'shipping_id'=>$shippingId])->fetchAll('assoc');
        

        /*
        $orders = [];
        $sql = '';

        if($productCategorieId != 'all' && !is_null($productCategorieId)){
            $products = $this->Products->find()
                            ->where(['Products.product_category_id'=>$productCategorieId])
                            ->toArray();

        }else{
            if($product != 'all' && !is_null($product)){
                $product = $this->Products->find()->where(['Products.id'=>$product])->first();

            }else{
                $sql = $this->ReadSqlFiles->read('delivery_get_order.sql');
            }
        }

        if($paymentmethod != 'all' && !is_null($paymentmethod)){

        }else{
            
        }
        */


        //$this->log($orders,'debug');
        return $orders;
    }

}
