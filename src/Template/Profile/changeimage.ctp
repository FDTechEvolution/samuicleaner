<div class="content container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="headline"><h2><?= __('Change Profile') ?></h2></div>
            <div class="col-md-3">
                <div class="responsive">
                    <?php
                    $profile = "user/user.jpg";
                    if ((!(is_null($user->image)) && $user->image != '')) {
                        $profile = '/uploads/images/' . $user->image->name;
                    } elseif ((!(is_null($user->profile_image))) && $user->profile_image != '') {
                        $profile = $user->profile_image;
                    }
                    ?>
                    <?= $this->Html->image($profile, ['class' => 'img-responsive profile-img margin-bottom-20']) ?> 
                </div>
            </div>
            <div class="col-md-4">

                <?= $this->Form->create('Image', ['novalidate' => true, 'class' => 'sky-form', 'name' => 'frm', 'enctype' => 'multipart/form-data', 'style' => 'border: none !important;']) ?>

                <section>
                    <label class="label"><?= __('Browse Image') ?></label>
                    <label class="input input-file" for="file">
                        <div class="button">
                            <?= $this->Form->control('image', ['type' => 'file', 'label' => false, 'onchange' => 'document.frm.v_image.value = this.value']); ?>
                            Browse
                        </div>
                        <input type="text" readonly="" name="[v_image]" id="v_image">
                    </label>
                </section>     
                <hr>
                <?= $this->Html->link($this->Form->button(__('Back'), ['class' => 'btn-u btn-u-dark', 'type' => 'button']), ['controller' => 'profile'], ['escape' => false]) ?>
                <?= $this->Form->button(__('Upload'), ['class' => 'btn-u']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>