<div class="row">
    <div class="col-md-12">
        <div class="hpanel">
            <div class="panel-heading">

                <h3>จัดการลูกค้า</h3>
            </div>
            <div class="panel-body">
                <table id="datatable1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ชื่อ - นามสกุล</th>
                            <th>โทร</th>
                            <th class="text-center" style="width: 100px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customer as $d): ?>
                            <?php if (sizeof($d->maids) == 0) { ?>
                                <tr>

                                    <td><?= h($d->firstname . '  ' . $d->lastname) ?></td>
                                    <td><?= h($d->phone) ?></td>

                                    <td class="text-center">
                                        <?= $this->Form->postLink(BUTTON_DEL, ['controller' => 'admincustomer', 'action' => 'delete', $d->id], ['escape' => false, 'class' => '', 'confirm' => __('ต้องการลบ "{0}"?', $d->firstname . '  ' . $d->lastname)]);
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php //debug($customer);?>
    </div>
    
</div>