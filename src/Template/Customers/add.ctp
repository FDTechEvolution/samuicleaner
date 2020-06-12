<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <h3>เพิ่มโลโก้ลูกค้า</h3>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="hpanel">
            <div class="panel-heading">
                เพิ่มโลโก้ลูกค้า
            </div>
            <div class="panel-body">
                <?= $this->Form->create($customer, ['class' => 'form-horizontal', 'novalidate' => true, 'enctype' => 'multipart/form-data']) ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ลำดับที่</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('seq', ['label' => false, 'class' => 'form-control','value'=>$number]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ชื่อลูกค้า</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('title', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">URL</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('url', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">โลโก้</label>
                    <?= $this->Form->control('_image', ['type' => 'file', 'label' => false, 'class' => '']); ?>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2 text-center">
                        <button type="submit" class="btn w-xs btn-success">Save</button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>