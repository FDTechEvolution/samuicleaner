<div class="header header-sticky">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="<?=SITE_URL?>">
            <?=$this->Html->image('logo/logo1-default.png', ['id' => 'logo-header'])?>
        </a>
        <!-- End Logo -->

        <!-- Topbar -->
        <div class="topbar">
            <ul class="loginbar pull-right">
                <li class="hoverSelector">
                    <i class="fa fa-globe"></i>
                    <a>Languages</a>
                    <ul class="languages hoverSelectorBlock">
                        <li class="">
                            <?= $this->Html->link('ภาษาไทย', ['controller' => 'language', 'action' => 'change', 'th']) ?>
                        </li>
                        <li>
                            <?= $this->Html->link('English', ['controller' => 'language', 'action' => 'change', 'en']) ?>
                        </li>

                    </ul>
                </li>
                <li class="topbar-devider"></li>
                <?php if ((is_null($this->request->session()->read('Auth.User')))) { ?>
                    <li><?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login']) ?></li>
                    <li class="topbar-devider"></li>
                    <li><?= $this->Html->link(__('Register'), ['controller' => 'users', 'action' => 'register']) ?></li>
                <?php } else { ?>
                    <li><?= $this->Html->link(__('Account'), ['controller' => 'profile', 'action' => 'index']) ?></li>
                    <li class="topbar-devider"></li>
                    <li><?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?></li>
                <?php } ?>
            </ul>
        </div>
        <!-- End Topbar -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="">

                    <?=$this->Html->link(__('Home'), ['controller' => 'home'])?>

                </li>
                <li class="">
                        <?=$this->Html->link(__('Service'), ['controller' => 'service'])?>
                    </li>
                    <li class="">
                        <?=$this->Html->link(__('Pricing'), ['controller' => 'pricing'])?>
                    </li>
                    <li class="">
                        <?=$this->Html->link(__('Book Your Cleaner'), ['controller' => 'bookings'])?>
                    </li>
                    <li class="">
                        <?=$this->Html->link(__('Become a Cleaner'), ['controller' => 'maids', 'action' => 'register'])?>
                    </li>

                    <li class="">
                        <?=$this->Html->link(__('Cancellation policy'), ['controller' => 'cancellation', 'action' => 'index'])?>
                    </li>
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>