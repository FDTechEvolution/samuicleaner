<!DOCTYPE html>
<html class="app-ui">
    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <!-- Document title -->
        <title></title>
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="description" content="" />
        <meta name="author" content="rustheme" />
        <meta name="robots" content="noindex, nofollow" />
        <!-- Google fonts -->
        <!-- AppUI CSS stylesheets -->
        <?= $this->Html->css('/admin_assets/css/font-awesome.css') ?>
        <?= $this->Html->css('/admin_assets/css/ionicons.css') ?>
        <?= $this->Html->css('/admin_assets/css/bootstrap.css') ?>
        <?= $this->Html->css('/admin_assets/css/app.css') ?>
        <?= $this->Html->css('/admin_assets/css/app-custom.css') ?>
        <!-- End Stylesheets -->
    </head>
    <body class="app-ui layout-has-drawer layout-has-fixed-header">
        <div class="app-layout-canvas">
            <div class="app-layout-container">
                <!-- Drawer -->
                <aside class="app-layout-drawer">
                    <!-- Drawer scroll area -->
                    <div class="app-layout-drawer-scroll">
                        <!-- Drawer logo -->
                        <div id="logo" class="drawer-header " style="padding:5px 40px 5px 40px;">
                            <?=$this->Html->image('logo/samui_cleaner.png',['class'=>'img-responsive'])?>
                        </div>
                        <!-- Drawer navigation -->
                        <nav class="drawer-main">
                            <ul class="nav nav-drawer">
                                <li class="nav-item">
                                    <?=$this->Html->link('<i class="ion-ios-speedometer-outline"></i>  Dashboard',
                                            ['controller'=>'adminhome','action'=>'index'],
                                            ['escape'=>false])?>
                                </li>
                                <li class="nav-item">
                                    <?=$this->Html->link('<i class="fa fa-users"></i> ลูกค้า',
                                            ['controller'=>'admincustomer','action'=>'index'],
                                            ['escape'=>false])?>
                                </li>
                                <li class="nav-item">
                                    <?=$this->Html->link('<i class="fa fa-female"></i> รายชื่อแม่บ้าน',
                                            ['controller'=>'adminmaid','action'=>'index'],
                                            ['escape'=>false])?>
                                </li>
                                <li class="nav-item">
                                    <?=$this->Html->link('<i class="ion-log-out"></i> ออกจากระบบ',
                                            ['controller'=>'users','action'=>'logout'],
                                            ['escape'=>false])?>
                                </li>
                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="ion-wrench"></i> การตั้งค่า</a>
                                    <ul class="nav nav-subnav">
                                        <li>
                                            <?=$this->Html->link('บริการ',
                                            ['controller'=>'users','action'=>'logout'],
                                            ['escape'=>false])?>
                                        </li>
                                        <li>
                                            <?=$this->Html->link('พื้นที่ให้บริการ',
                                            ['controller'=>'users','action'=>'logout'],
                                            ['escape'=>false])?>
                                        </li>
                                        <li>
                                            <?=$this->Html->link('ราคา',
                                            ['controller'=>'users','action'=>'logout'],
                                            ['escape'=>false])?>
                                        </li>
                                        <li>
                                            <?=$this->Html->link('Banner',
                                            ['controller'=>'banners','action'=>'index'],
                                            ['escape'=>false])?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- End drawer navigation -->

                        <div class="drawer-footer">
                            <p class="copyright">FinSoft Template &copy;</p>
                        </div>
                    </div>
                    <!-- End drawer scroll area -->
                </aside>
                <!-- End drawer -->
                <!-- Header -->
                <header class="app-layout-header">      
                </header>
                <!-- End header -->
                <main class="app-layout-content">
                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>
                    <!-- End Page Content -->
                </main>
            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->
        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <?=$this->Html->script('/admin_assets/js/core/jquery.min.js')?>
        <?=$this->Html->script('/admin_assets/js/core/bootstrap.min.js')?>
        <?=$this->Html->script('/admin_assets/js/core/jquery.slimscroll.min.js')?>
        <?=$this->Html->script('/admin_assets/js/core/jquery.scrollLock.min.js')?>
        <?=$this->Html->script('/admin_assets/js/core/jquery.placeholder.min.js')?>
        <?=$this->Html->script('/admin_assets/js/app.js')?>
        <?=$this->Html->script('/admin_assets/js/app-custom.js')?>
    </body>
</html>