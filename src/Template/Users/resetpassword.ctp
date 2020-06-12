<div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <?= $this->Form->create($user, ['novalidate' => true]) ?>
        <div class="reg-header">
            <h2><?=__('Reset Password')?></h2>
        </div>
        <div class="row margin-top-20">
            <div class="col-sm-6">
                <label>New Password <span class="color-red">*</span></label>
                <?= $this->Form->control('password', ['class' => 'form-control', 'label' => false,'value'=>'']); ?>
            </div>
            <div class="col-sm-6">
                <label>Confirm New Password <span class="color-red">*</span></label>
                <?= $this->Form->control('confirmpassword', ['type' => 'password', 'class' => 'form-control', 'label' => false]); ?>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-lg-12 text-left">
                <?= $this->Form->button(__('Reset Password'), ['class' => 'btn-u']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>