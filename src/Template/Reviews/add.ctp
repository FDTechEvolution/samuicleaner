<div class="row">
    <div class="col-md-8">
        <div class="hpanel">
            <div class="panel-heading">

                <h3>เพิ่มรีวิวลูกค้า</h3>
            </div>
            <div class="panel-body ">
                <?= $this->Form->create($review, ['class' => 'form-horizontal', 'novalidate' => true, 'enctype' => 'multipart/form-data']) ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ชื่อผู้รีวิว</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('name', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ชื่อผู้รีวิว</label>
                    <div class="col-sm-9">
                        <?= $this->Form->textarea('description', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">รูป</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('_image', ['type' => 'file', 'label' => false, 'class' => '']); ?>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2 text-center">
                        <button type="submit" class="btn w-xs btn-success">บันทึก</button>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

