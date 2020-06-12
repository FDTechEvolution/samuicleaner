<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <h3>ตั้งค่าบริการ</h3>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-heading">
                ตั้งค่าราคาและส่วนลด
            </div>
            <div class="panel-body">
                <?=
                $this->Form->create($appsetting, ['class' => 'form-horizontal', 'novalidate' => true,
                    'url' => ['controller' => 'appsettings', 'action' => 'index']])
                ?>

                <div class="form-group">
                    <label class="col-sm-5 control-label">ค่าบริการต่อชั่วโมง (บาท)</label>
                    <div class="col-sm-7">
                        <?= $this->Form->control('price_per_hour', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">ส่วนลด (%)</label>
                    <div class="col-sm-7">
                        <?= $this->Form->control('discount_percent', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2 text-center">
                        <button type="submit" class="btn w-xs btn-success">Save changes</button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-heading">
                ตั้งค่าส่วนเสริม
            </div>
            <div class="panel-body">
                <?= $this->Html->link(BUTTON_ADD, ['controller' => 'services', 'action' => 'add'], ['escape' => false, 'class' => ''])
                ?>

                <table id="" class="table table-striped table-bordered table-hover" style="margin-top: 10px !important;">
                    <thead>
                        <tr>
                            <th>รายการ</th>
                            <th></th>
                            <th>ราคา</th>
                            <th class="text-center" style="width: 100px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($addons as $value): ?>
                            <tr>

                                <td><?= h($value->name_th) ?></td>
                                <td><?= h($value->name_eng) ?></td>
                                <td><?= h($value->price) ?></td>
                                <td class="text-center">
                                    <?= $this->Html->link(BUTTON_EDIT, ['controller' => 'services', 'action' => 'edit', $value->id], ['escape' => false, 'class' => '']);
                                    ?>
                                    <?= $this->Form->postLink(BUTTON_DEL, ['controller' => 'services', 'action' => 'delete', $value->id], ['escape' => false, 'class' => '', 'confirm' => __('ต้องการลบ "{0}"?', $value->name_th)]);
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