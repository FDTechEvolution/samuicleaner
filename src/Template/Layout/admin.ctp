<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Page title -->
        <title></title>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

        <!-- Vendor styles -->
        <?= $this->Html->css('/admin_assetsv2/vendor/fontawesome/css/font-awesome.css') ?>
        <?= $this->Html->css('/admin_assetsv2/vendor/metisMenu/dist/metisMenu.css') ?>
        <?= $this->Html->css('/admin_assetsv2/vendor/animate.css/animate.css') ?>
        <?= $this->Html->css('/admin_assetsv2/vendor/bootstrap/dist/css/bootstrap.css') ?>
        <?= $this->Html->css('/admin_assetsv2/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>
        <?= $this->Html->css('/admin_assetsv2/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') ?>
        <?= $this->Html->css('/admin_assetsv2/fonts/pe-icon-7-stroke/css/helper.css') ?>
        <?= $this->Html->css('/admin_assetsv2/styles/style.css') ?>
        <?= $this->Html->css('/admin_assetsv2/styles/style_me.css') ?>


        <?= $this->Html->script('/admin_assetsv2/vendor/jquery/dist/jquery.min.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/jquery-ui/jquery-ui.min.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/slimScroll/jquery.slimscroll.min.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/bootstrap/dist/js/bootstrap.min.js') ?>
        <script>
            var SITE_URL = '<?=SITE_URL?>';
            </script>

    </head>
    <body class="fixed-navbar sidebar-scroll">

        <style>
            .skin-option {
                position: fixed;
                text-align: center;
                right: -1px;
                padding: 10px;
                top: 80px;
                width: 150px;
                height: 133px;
                text-transform: uppercase;
                background-color: #ffffff;
                box-shadow: 0 1px 10px 0px rgba(0, 0, 0, 0.05), 10px 12px 7px 3px rgba(0, 0, 0, .1);
                border-radius: 4px 0 0 4px;
                z-index: 100;
            }
        </style>
        <!-- End skin option / for demo purpose only -->

        <!-- Header -->
        <div id="header">
            <div class="color-line">
            </div>
            <div id="logo" class="light-version">
                <span>
                    SamuiCleaner Admin
                </span>
            </div>
            <nav role="navigation">
                <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
                <div class="small-logo">
                    <span class="text-primary">HOMER APP</span>
                </div>

                <div class="mobile-menu">
                    <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <div class="collapse mobile-navbar" id="mobile-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a class="" href="login.html">Login</a>
                            </li>
                            <li>
                                <a class="" href="login.html">Logout</a>
                            </li>
                            <li>
                                <a class="" href="profile.html">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav no-borders">

                        <li class="dropdown" title="ออกจากระบบ">
                            <?=
                            $this->Html->link('<i class="pe-7s-upload pe-rotate-90"></i>', ['controller' => 'users', 'action' => 'logout'], ['escape' => false])
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Navigation -->
        <aside id="menu">
            <div id="navigation">


                <ul class="nav" id="side-menu">
                    <?php
                    $c = strtolower($this->request->getParam('controller'));
                    ?>
                    <li class="<?= $c == 'adminhome' ? 'active' : '' ?>">
                        <?=
                        $this->Html->link('<span class="nav-label">Dashboard</span>', ['controller' => 'adminhome', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>
                    <li class="<?= $c == 'adminbooking' ? 'active' : '' ?>">
                        <?=
                        $this->Html->link('<span class="nav-label">รายการจอง</span>', ['controller' => 'adminbooking', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>
                    <li class="<?= $c == 'admincustomer' ? 'active' : '' ?>">
                        <?=
                        $this->Html->link('<span class="nav-label">รายชื่อลูกค้า</span>', ['controller' => 'admincustomer', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>
                    <li class="<?= $c == 'adminmaid' ? 'active' : '' ?>">
                        <?=
                        $this->Html->link('<span class="nav-label">จัดการแม่บ้าน</span>', ['controller' => 'adminmaid', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>
                    <li class="<?= $c == 'adminsetting' ? 'active' : '' ?>">
                        <?=
                        $this->Html->link('<span class="nav-label">ตั้งค่าอีเมล</span>', ['controller' => 'adminsetting', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>
                    <li class="<?= $c == 'appsettings' ? 'active' : '' ?>">
                        <?=
                        $this->Html->link('<span class="nav-label">ตั้งค่าบริการ</span>', ['controller' => 'appsettings', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>
                    <li class="<?= $c == 'customers' ? 'active' : '' ?>">
                        <?=
                        $this->Html->link('<span class="nav-label">ตั้งค่าโลโก้ลูกค้า</span>', ['controller' => 'customers', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>
                    <li class="<?= $c == 'reviews' ? 'active' : '' ?>">
                        <?=
                        $this->Html->link('<span class="nav-label">ตั้งค่ารีวิวลูกค้า</span>', ['controller' => 'reviews', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>



                </ul>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="content">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>

            </div>

            <!-- Right sidebar -->
            <div id="right-sidebar" class="animated fadeInRight">

                <div class="p-m">
                    <button id="sidebar-close" class="right-sidebar-toggle sidebar-button btn btn-default m-b-md"><i class="pe pe-7s-close"></i>
                    </button>
                    <div>
                        <span class="font-bold no-margins"> Analytics </span>
                        <br>
                        <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.</small>
                    </div>
                    <div class="row m-t-sm m-b-sm">
                        <div class="col-lg-6">
                            <h3 class="no-margins font-extra-bold text-success">300,102</h3>

                            <div class="font-bold">98% <i class="fa fa-level-up text-success"></i></div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="no-margins font-extra-bold text-success">280,200</h3>

                            <div class="font-bold">98% <i class="fa fa-level-up text-success"></i></div>
                        </div>
                    </div>
                    <div class="progress m-t-xs full progress-small">
                        <div style="width: 25%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" role="progressbar"
                             class=" progress-bar progress-bar-success">
                            <span class="sr-only">35% Complete (success)</span>
                        </div>
                    </div>
                </div>
                <div class="p-m bg-light border-bottom border-top">
                    <span class="font-bold no-margins"> Social talks </span>
                    <br>
                    <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.</small>
                    <div class="m-t-md">
                        <div class="social-talk">
                            <div class="media social-profile clearfix">
                                <!--
                                <a class="pull-left">
                                    <img src="images/a1.jpg" alt="profile-picture">
                                </a>
                                -->

                                <div class="media-body">
                                    <span class="font-bold">John Novak</span>
                                    <small class="text-muted">21.03.2015</small>
                                    <div class="social-content small">
                                        Injected humour, or randomised words which don't look even slightly believable.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-talk">
                            <div class="media social-profile clearfix">
                                <!--
                                <a class="pull-left">
                                    <img src="images/a3.jpg" alt="profile-picture">
                                </a>
                                -->

                                <div class="media-body">
                                    <span class="font-bold">Mark Smith</span>
                                    <small class="text-muted">14.04.2015</small>
                                    <div class="social-content">
                                        Many desktop publishing packages and web page editors.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-talk">
                            <div class="media social-profile clearfix">
                                <!--
                                 <a class="pull-left">
                                     <img src="images/a4.jpg" alt="profile-picture">
                                 </a>
                                -->

                                <div class="media-body">
                                    <span class="font-bold">Marica Morgan</span>
                                    <small class="text-muted">21.03.2015</small>

                                    <div class="social-content">
                                        There are many variations of passages of Lorem Ipsum available, but the majority have
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-m">
                    <span class="font-bold no-margins"> Sales in last week </span>
                    <div class="m-t-xs">
                        <div class="row">
                            <div class="col-xs-6">
                                <small>Today</small>
                                <h4 class="m-t-xs">$170,20 <i class="fa fa-level-up text-success"></i></h4>
                            </div>
                            <div class="col-xs-6">
                                <small>Last week</small>
                                <h4 class="m-t-xs">$580,90 <i class="fa fa-level-up text-success"></i></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small>Today</small>
                                <h4 class="m-t-xs">$620,20 <i class="fa fa-level-up text-success"></i></h4>
                            </div>
                            <div class="col-xs-6">
                                <small>Last week</small>
                                <h4 class="m-t-xs">$140,70 <i class="fa fa-level-up text-success"></i></h4>
                            </div>
                        </div>
                    </div>
                    <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.
                        Many desktop publishing packages and web page editors.
                    </small>
                </div>

            </div>

            <!-- Footer-->
            <footer class="footer">
                <span class="pull-right">
                    Development by <?= $this->Html->link('FDTech', 'https://fdtech.co.th', ['target' => '_blank']) ?>
                </span>
                samuicleaner 2018
            </footer>

        </div>


        <?= $this->Html->script('/admin_assetsv2/vendor/jquery-flot/jquery.flot.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/jquery-flot/jquery.flot.resize.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/jquery-flot/jquery.flot.pie.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/flot.curvedlines/curvedLines.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/jquery.flot.spline/index.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/metisMenu/dist/metisMenu.min.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/iCheck/icheck.min.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/peity/jquery.peity.min.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/sparkline/index.js') ?>
        <?= $this->Html->script('/admin_assetsv2/scripts/homer.js') ?>
        <?= $this->Html->script('/admin_assetsv2/scripts/charts.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/datatables/media/js/jquery.dataTables.min.js') ?>
        <?= $this->Html->script('/admin_assetsv2/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>


        <script>

            $(function () {
                // Initialize Example 2
                var table = $('#datatable1').dataTable({
                    "lengthChange": false,
                    "lengthMenu": [[50, -1], [50, "All"]],
                    "ordering": false
                });
                //table.clearAll();
                //table.load();
            });

        </script>
    </body>
</html>