<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="hpanel">
            <div class="panel-heading">

                <h3>จัดการโลโก้ลูกค้า</h3>
            </div>
            <div class="panel-body ">
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Html->link(BUTTON_ADD, ['action' => 'add'], ['escape' => false, 'class' => ''])
                        ?>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <table id="datatable1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="60px">ลำดับ</th>
                            <th width="200px">โลโก้</th>
                            <th>ชื่อ</th>
                            <th>URL</th>
                            <th class="text-center" style="width: 100px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td><?=$customer->seq?></td>
                                <td>
                                    <?php
                                        $image_path = $customer->has('image') ? '/uploads/images/'.$customer->image->name:'noprofile.png';
                                    ?>
                                    <?=$this->Html->image($image_path,['class' => 'img-responsive','width'=>'200px']);?>
                                </td>
                                <td><?= h($customer->title) ?></td>
                                <td><?=$customer->url?></td>
                                <td class="text-center">
                                    <?= $this->Html->link(BUTTON_EDIT, ['action' => 'edit', $customer->id], ['escape' => false, 'class' => '']);
                                    ?>
                                    <?= $this->Form->postLink(BUTTON_DEL, ['action' => 'delete', $customer->id], ['escape' => false, 'class' => '', 'confirm' => __('ต้องการลบ "{0}"?', $customer->title)]);
                                    ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>