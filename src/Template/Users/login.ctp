
<div class="log-reg-v3 content-md">
    <div class="container">
        <div class="row">
            <?= $this->Flash->render() ?>
            <div class="col-md-7 md-margin-bottom-50">
                <?= $this->Html->image('loginpage.jpg', ['class' => 'img-responsive']) ?>
            </div>

            <div class="col-md-5">
                <?= $this->Form->create('Users', ['novalidate' => true, 'class' => 'log-reg-block sky-form', 'id' => 'sky-form']) ?>
                <h2>Log in to your account</h2>

                <section>
                    <label class="input login-input">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Email Address']); ?>
                        </div>
                    </label>
                </section>
                <section>
                    <label class="input login-input no-border-top">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <?= $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Password']); ?>
                        </div>
                    </label>
                </section>


                <div class="row margin-bottom-5">
                    <div class="col-xs-6">

                    </div>
                    <div class="col-xs-6 text-right">
                        <?= $this->Html->link(__('Forget your Password?'), ['controller' => 'users', 'action' => 'forgot'], ['class' => 'color-green']) ?>
                    </div>
                </div>
                <?= $this->Form->button(__('Login'), ['class' => 'btn-u btn-u-sea-shop btn-block margin-bottom-20']) ?>

                <div class="border-wings">
                    <span>or</span>
                </div>

                <div class="row columns-space-removes">
                    <div class="col-lg-8 col-lg-offset-2 margin-bottom-10 text-center">
                        <?= ''//$this->Html->link('<button class="btn-u btn-u-md btn-u-fb btn-block" type="button"><i class="fa fa-facebook"></i> Facebook Log In</button>', ['controller' => 'facebook', 'action' => 'login'], ['escape' => false])?>
                        <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div>
                    </div>
                    
                </div>
                <?= $this->Form->end() ?>

                <div class="margin-bottom-20"></div>
                <p class="text-center"><?= __("Don't have account yet? Learn more and") ?> <?= $this->Html->link(__('Register'), ['controller' => 'users', 'action' => 'register']) ?></p>
            </div>
        </div><!--/end row-->
    </div><!--/end container-->
</div>

<div id="fb-root"></div>

<?= $this->Html->script('facebook-login.js')?>