<?php 

use Cake\Core\Configure;



/*Custom*/
define('RECAPTCHA_VAL', false);
define('PAGE_LiMIT', 50);
define('NUMBER_FORMAT', '#,##,##0');

define('SITE_URL', 'https://'.env('SERVER_NAME').'/');
define('GOOGLE_MAP_API_KEY', 'AIzaSyBlBNYnIC9qGPT2dEMmbpnPFMYtFbqaXpM');




/*Define controller*/
define('C_CONTROLLER', 'controller');
define('C_SUCCESS', 'success');


/*Master data*/
define('M_USER_TYPE_MEMBER', 'MEMBER');
define('M_USER_TYPE_ADMIN', 'ADMIN');
define('M_USER_TYPE_MAID', 'MAID');


define('RATE_PER_HOUR', 200);
define('DISCOUNT_PERCEN', 5);
define('TOTAL_MONTH', 1);

Configure::write('M_BOOK_STATUS', [
    'DR'=>['name'=>'Draf','label'=>'label label-warning'],
    'WT'=>['name'=>'Waiting for Payment','label'=>'label label-warning'],
    'CO'=>['name'=>'Completed','label'=>'label label-success'],
    'VO'=>['name'=>'Canceled','label'=>'label label-danger']
    ]);

Configure::write('DAY_OF_WEEK', ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);
Configure::write('SERVICE_AREA', [
    'Samui'=>'Samui',
    'PhaNgan'=>'PhaNgan',
    'Koh tao'=>'Koh tao',
    'Mueng SuratThani'=>'Mueng SuratThani'
    ]);

Configure::write('SERVICE_AREAS', [
    'Samui'=>['name'=>'Samui','code'=>'SM','lat'=>9.5019934,'long'=>99.9985587],
    'PhaNgan'=>['name'=>'PhaNgan','code'=>'PN','lat'=>9.739344,'long'=>99.992357],
    'Koh tao'=>['name'=>'Koh tao','code'=>'KT','lat'=>10.084112,'long'=>99.825309],
    'Mueng SuratThani'=>['name'=>'Mueng SuratThani','code'=>'SR','lat'=>9.159462,'long'=>99.269704]
    ]);

Configure::write('SERVICE_AREA_LATLONG', [
    'Samui'=>['lat'=>9.5019934,'long'=>99.9985587,'code'=>'SM'],
    'PhaNgan'=>['lat'=>9.739344,'long'=>99.992357,'code'=>'PN'],
    'Koh tao'=>['lat'=>10.084112,'long'=>99.825309,'code'=>'KT'],
    'Mueng SuratThani'=>['lat'=>9.159462,'long'=>99.269704,'code'=>'SR']]);

Configure::write('SERVICE_TYPE', ['Cleaning Service']);
Configure::write('ROOM', [1=>'1 Room',2=>'2 Room',3=>'3 Room',4=>'4 Room',5=>'5 Room']);
Configure::write('HOUR', [100=>'1 Hour',150=>'1.5 Hour',
    200=>'2 Hour',250=>'2.5 Hour',
    300=>'3 Hour',350=>'3.5 Hour',
    400=>'4 Hour',450=>'4.5 Hour',
    500=>'5 Hour',550=>'5.5 Hour',
    600=>'6 Hour',650=>'6.5 Hour',
    700=>'7 Hour',750=>'7.5 Hour',800=>'8 Hour']);

Configure::write('TIME', [
        '07:30'=>'07:30',
        '08:00'=>'08:00',
        '08:30'=>'08:30',
        '09:00'=>'09:00',
        '09:30'=>'09:30',
        '10:00'=>'10:00',
        '10:30'=>'10:30',
        '11:00'=>'11:00',
        '11:30'=>'11:30',
        '12:00'=>'12:00',
        '12:30'=>'12:30',
        '13:00'=>'13:00',
        '13:30'=>'13:30',
        '14:00'=>'14:00',
        '14:30'=>'14:30',
        '15:00'=>'15:00',
        '15:30'=>'15:30',
        '16:00'=>'16:00',
        '16:30'=>'16:30',
        '17:00'=>'17:00',
        '17:30'=>'17:30',
        '18:00'=>'18:00',
        '18:30'=>'18:30',
        '19:00'=>'19:00',
        '19:30'=>'19:30',
        '20:00'=>'20:00',
        '20:30'=>'20:30',
        '21:00'=>'21:00',
        '21:30'=>'21:30']);

Configure::write('PACKAGE', ['S'=>'Single Booking','M'=>'Monthly','MP'=>'Monthly Premium','HR'=>'Holiday Rental']);

Configure::write('DAYS', [
    1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,
    11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,17=>17,18=>18,19=>19,20=>20,
    21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30,31=>31,
]);
Configure::write('MONTH_EN', [
    1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',
    7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'
]);
Configure::write('MONTH_TH', [
    1=>'มกราคม',2=>'กุมภาพันธ์',3=>'มีนาคม',4=>'เมษายน',5=>'พฤษภาคม',6=>'มิถุนายน',
    7=>'กรกฎาคม',8=>'สิงหาคม',9=>'กันยายน',10=>'ตุลาคม',11=>'พฤศจิกายน',12=>'ธันวาคม'
]);
define('START_YEAR', 1900);

Configure::write('Config.language', 'en');

/*Message*/
define('MSG_ERR_SOMETHINGWRONG', 'Oop! Something wrong');
define('MSG_SUC_SAVE', '');

define('MSG_ERR_PASSWORD_NOT_MATCH', 'Your password and confirmation password do not match.');



require_once(ROOT . DS . 'vendor' . DS . "facebook-sdk-v5" . DS . "autoload.php");

define('DATE_TIME_FORMATE', 'dd/MM/yyyy HH:mm');
define('TIME', 'HH:mm');
define('DATE_FORMATE', 'dd/MM/yyyy');
define('TH_DATE', 'en-IR@calendar=buddhist');



/*HTML*/
define('BUTTON_EDIT', '<button type="button" class="btn btn-success btn-circle"><i class="fa fa-edit"></i></button>');
define('BUTTON_DEL', '<button type="button" class="btn btn-danger btn-circle"><i class="pe-7s-trash"></i></button>');
define('BUTTON_ADD', '<button class="btn btn-success" type="button"><i class="pe-7s-plus"></i> <span class="bold">เพิ่ม</span></button>');
