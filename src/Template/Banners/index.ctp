<div class="card">
    <div class="card-header">
        <h4>Banner</h4>
    </div>
    <div class="card-block">
        <div class="table-responsive">

            <table class="table table-striped table-borderless table-vcenter">
                <thead>
                    <tr>
                        <th>หน้า</th>
                        <th></th>
                        <th>รายละเอียด</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($banners as $d): ?>
                        <tr>
                            <td><?= h($d->page) ?></td>
                            <td class="text-center">
                                <?php if (isset($d->image->path)) { ?>
                                    <?= $this->Html->image('/uploads/images/' . $d->image->name, ['class' => '','height'=>'50px']) ?>
                                <?php } else { ?>
                                    <?= $this->Html->image('/admin_assets/img/avatars/avatar2.jpg', ['class' => '','height'=>'50px']) ?>
                                <?php } ?>
                            </td>
                            <td><?= h($d->description) ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <?=$this->Html->link('<i class="ion-edit"></i> Edit',['controller'=>'banners','action'=>'edit',$d->id],['escape'=>false])?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
