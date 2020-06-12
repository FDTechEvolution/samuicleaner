
<div class="row">
    <div class="col-md-12">
        <div class="hpanel">
            <div class="panel-heading">

                <h3>จัดการรีวิวลูกค้า</h3>
            </div>
            <div class="panel-body ">
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Html->link(BUTTON_ADD, ['action' => 'add'], ['escape' => false, 'class' => ''])
                        ?>
                    </div>
                </div>
                
                <table id="datatable1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="150px">รูป</th>
                            <th width="300px">ชือ</th>
                            
                            <th>รีวิว</th>
                            
                            <th class="text-center" style="width: 100px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reviews as $review): ?>
                            <tr>
                                <td>
                                    <?php
                                        $image_path = $review->has('image') ? '/uploads/images/'.$review->image->name:'noprofile.png';
                                    ?>
                                    <?=$this->Html->image($image_path,['class' => 'img-responsive','width'=>'150px']);?>
                                </td>
                                <td><?=$review->name?></td>
                                
                                <td><?=$review->description?></td>
                                <td class="text-center">
                                    <?= $this->Html->link(BUTTON_EDIT, ['action' => 'edit', $review->id], ['escape' => false, 'class' => '']);
                                    ?>
                                    <?= $this->Form->postLink(BUTTON_DEL, ['action' => 'delete', $review->id], ['escape' => false, 'class' => '', 'confirm' => __('ต้องการลบ "{0}"?', $review->name)]);
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

