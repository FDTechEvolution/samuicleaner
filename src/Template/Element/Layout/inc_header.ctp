<!--=== Header v5 ===-->
<div class="header-v5 header-static">
    <!-- Topbar v3 -->
    <div class="topbar-v3">
        <div class="search-open">
            <div class="container">
                <input type="text" class="form-control" placeholder="Search">
                <div class="search-close"><i class="icon-close"></i></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ul class="list-inline right-topbar pull-right">

                        <?php if ((is_null($this->request->session()->read('Auth.User')))) { ?>
                            <li><?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login']) ?> | 
                                <?= $this->Html->link(__('Register'), ['controller' => 'users', 'action' => 'register']) ?>
                            </li>
                        <?php } else { ?>
                            <li><?= $this->Html->link(__('Account'), ['controller' => 'profile', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?></li>
                        <?php } ?>
                        <li><?= $this->Html->link('ภาษาไทย', ['controller' => 'language', 'action' => 'change', 'th']) ?> | 
                            <?= $this->Html->link('English', ['controller' => 'language', 'action' => 'change', 'en']) ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--/container-->
    </div>
    <!-- End Topbar v3 -->

    <!-- Navbar -->
    <div class="navbar navbar-default mega-menu" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= $this->Html->link($this->Html->image('logo/samui_cleaner_logo.png', ['id' => 'logo-header']), '/', ['' => '', 'class' => 'navbar-brand', 'escape' => false]); ?>
            </div>

            <!-- Shopping Cart -->
            <?php if (!(is_null($this->request->session()->read('Auth.User')))) { ?>
                <?php
                
                $user = $this->request->session()->read('Auth.User');
                //debug($user->profile_image);
                $profile = "user/user.jpg";
                if ((!(is_null($user->image)) && $user->image != '')) {
                    $profile = '/uploads/images/' . $user->image->name;
                }elseif((!(is_null($user->profile_image))) && $user->profile_image!=''){
                    $profile = $user->profile_image;
                }
                ?>
                <div class="shop-badge badge-icons pull-right">
                    <?= $this->Html->image($profile, ['class' => 'rounded-x', 'width' => '32px']) ?>
                </div>
            <?php } ?>

            <!-- End Shopping Cart -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <!-- Nav Menu -->
                <ul class="nav navbar-nav">
                    <li class="">
                        <?= $this->Html->link(__('Home'), ['controller' => 'home']) ?>
                    </li>
                    <li class="">
                        <?= $this->Html->link(__('Cleaning Service'), ['controller' => 'service']) ?>
                    </li>
                    <li class="">
                        <?= $this->Html->link(__('Pricing'), ['controller' => 'pricing']) ?>
                    </li>
                    <li class="">
                        <?= $this->Html->link(__('Book Your Cleaner'), ['controller' => 'bookings']) ?>
                    </li>
                    <li class="">
                        <?= $this->Html->link(__('Become a Cleaner'), ['controller' => 'maids', 'action' => 'register']) ?>
                    </li>

                    <li class="">
                        <?= $this->Html->link(__('Cancellation policy'), ['controller' => 'cancellation', 'action' => 'index']) ?>
                    </li>

                </ul>
                <!-- End Nav Menu -->
            </div>
        </div>
    </div>
    <!-- End Navbar -->
</div>
<!--=== End Header v5 ===-->
