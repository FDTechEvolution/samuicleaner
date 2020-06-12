
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <?= $this->Form->create('Users',['novalidate' => true]) ?>
        <div class="reg-header">
            <h2><?=__('Reset your password?')?></h2>
        </div>

        <label class="margin-top-20">Email Address <span class="color-red">*</span></label>
        <?= $this->Form->control('email', ['class' => 'form-control', 'label' => false]); ?>

        <hr>
        <div class="row">
            
            <div class="col-lg-12 text-left">
                <?= $this->Form->button(__('Send verification email'), ['class' => 'btn-u']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>