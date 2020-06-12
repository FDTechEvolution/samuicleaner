<div class="row">
    <div class="col-md-12">
        <div class="hpanel">
            <div class="panel-heading">

                <h3>จัดการแม่บ้าน</h3>
            </div>
            <div class="panel-body">
                <table id="datatable1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ชื่อ - นามสกุล</th>
                            <th>โทร</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 100px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($maids as $d): ?>
                            <tr>

                                <td><?= h($d->user->fullname_th) ?></td>
                                <td><?= h($d->user->phone) ?></td>
                                <td>
                                    <?php
                                    if ($d->isapproved == 'Y') {
                                        if($d->isactive =='Y'){
                                            echo '<strong class="text-success">Online</strong> | ';
                                            echo $this->Html->link('Click to Offline', ['controller' => 'adminmaid', 'action' => 'setoffline', $d->id], ['escape' => false, 'class' => 'text-danger']);
                                        }else{
                                            echo '<strong class="text-danger">Offline</strong> | ';
                                            echo $this->Html->link('Click to Online', ['controller' => 'adminmaid', 'action' => 'setonline', $d->id], ['escape' => false, 'class' => 'text-success']);
                                        }
                                        
                                    } else {
                                        echo $this->Html->link('Click to Approve', ['controller' => 'adminmaid', 'action' => 'approve', $d->id], ['escape' => false, 'class' => 'text-danger']);
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?= $this->Html->link(BUTTON_EDIT, ['controller' => 'adminmaid', 'action' => 'edit', $d->id], ['escape' => false, 'class' => '']);
                                        ?>
                                   <?= $this->Form->postLink(BUTTON_DEL, ['controller' => 'adminmaid', 'action' => 'delete', $d->id], ['escape' => false, 'class' => '', 'confirm' => __('ต้องการลบ "{0}"?', $d->user->firstname . '  ' . $d->user->lastname)]);
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
