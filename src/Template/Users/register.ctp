

<div class="log-reg-v3 content-md">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?=$this->Html->image('loginpage.jpg',['class'=>'img-responsive'])?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->create($user, ['novalidate' => true, 'class' => 'log-reg-block sky-form', 'id' => 'sky-form4']) ?>
                <div class="reg-header">
                    <h2>Register a new account</h2>
                    <p>Already Signed Up? Click <?=$this->Html->link(__('Login'),['controller'=>'users','action'=>'login'],['class'=>'color-green'])?> to login your account.</p>
                </div>
                <div class="login-input reg-input">

                    <div class="row">
                        <section class="col-sm-6">
                            <label class="input">
                                <?= $this->Form->control('firstname', ['class' => 'form-control', 'label' => false, 'placeholder' => __('Firstname')]); ?>
                            </label>
                        </section>
                        <section class="col-sm-6">
                            <label class="input">
                                <?= $this->Form->control('lastname', ['class' => 'form-control', 'label' => false, 'placeholder' => __('Lastname')]); ?>
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col-sm-6">
                            <label class="input">
                                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => __('Email')]); ?>
                            </label>
                        </section>
                        <section class="col-sm-6">
                            <label class="input">
                                <?= $this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => __('Phone')]); ?>
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col-sm-6">
                            <label class="input">
                                <?= $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => __('Password')]); ?>
                            </label>
                        </section>
                        <section class="col-sm-6">
                            <label class="input">
                                <?= $this->Form->control('confirmpassword', ['type' => 'password','class' => 'form-control', 'label' => false, 'placeholder' => __('Confirm Password')]); ?>
                            </label>
                        </section>
                    </div>
                    <?= $this->Form->button(__('Register'), ['class' => 'btn-u btn-u-sea-shop btn-block margin-bottom-20']) ?>

                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>