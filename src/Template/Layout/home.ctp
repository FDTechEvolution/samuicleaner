<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title>www.samuicleaner.com::Think clean, Think Maid to order</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">

        <?= $this->Html->css('style.css') ?>

        <!-- CSS Global Compulsory -->
        <?= $this->Html->css('/assets/plugins/bootstrap/css/bootstrap.min.css') ?>
        <?= $this->Html->css('/assets/css/style.css') ?>


        <!-- CSS Header and Footer -->
        <?= $this->Html->css('/assets/css/headers/header-default.css') ?>
        <?= $this->Html->css('/assets/css/footers/footer-v1.css') ?>

        <!-- CSS Implementing Plugins -->
        <?= $this->Html->css('/assets/plugins/animate.css') ?>
        <?= $this->Html->css('/assets/plugins/line-icons/line-icons.css') ?>
        <?= $this->Html->css('/assets/plugins/font-awesome/css/font-awesome.min.css') ?>
        <?= $this->Html->css('/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css') ?>
        <?= $this->Html->css('/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css') ?>

        <?= $this->Html->css('/assets/plugins/fancybox/source/jquery.fancybox.css') ?>
        <?= $this->Html->css('/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') ?>
        <?= $this->Html->css('/assets/plugins/revolution-slider/rs-plugin/css/settings.css') ?>

        <!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/revolution-slider/rs-plugin/css/settings-ie8.css" type="text/css" media="screen"><![endif]-->

        <!-- CSS Theme -->
        <?= $this->Html->css('/assets/css/theme-colors/default.css', ['id' => 'style_color']) ?>
        <?= $this->Html->css('/assets/css/theme-skins/dark.css') ?>

        <!-- CSS Customization -->
        <link rel="stylesheet" href="assets/css/custom.css">
        <?=$this->Html->script('/assets/plugins/jquery/jquery.min.js'); ?>
<?=$this->Html->script('/assets/plugins/jquery/jquery-migrate.min.js')?>
<?=$this->Html->script('/assets/plugins/bootstrap/js/bootstrap.min.js')?>
    </head>

    <body>
        <div class="wrapper page-option-v1">
            <!--=== Header ===-->
            <?= $this->element('Layout/inc_header'); ?>
            <!--=== End Header ===-->

            <?= $this->fetch('content') ?>


            <?= $this->element('Layout/inc_footer'); ?>

        </div><!--/wrapper-->

        <!-- JS Global Compulsory -->
        
<!-- JS Implementing Plugins -->
<?=$this->Html->script('/assets/plugins/back-to-top.js')?>
<?=$this->Html->script('/assets/plugins/smoothScroll.js')?>
<?=$this->Html->script('/assets/plugins/jquery.parallax.js')?>
<?=$this->Html->script('/assets/plugins/fancybox/source/jquery.fancybox.pack.js')?>
<?=$this->Html->script('/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')?>
<?=$this->Html->script('/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js')?>
<?=$this->Html->script('/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js')?>

<?=$this->Html->script('/assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')?>
<?=$this->Html->script('/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')?>
<?=$this->Html->script('/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')?>
        
<!-- JS Customization -->
<?=$this->Html->script('/assets/js/custom.js')?>
<!-- JS Page Level -->
<?=$this->Html->script('/assets/js/app.js')?>
<?=$this->Html->script('/assets/js/plugins/fancy-box.js')?>
<?=$this->Html->script('/assets/js/plugins/owl-carousel.js')?>
<?=$this->Html->script('/assets/js/plugins/revolution-slider.js')?>
<?=$this->Html->script('/assets/js/plugins/masking.js')?>
<?=$this->Html->script('/assets/js/plugins/datepicker.js')?>
<?=$this->Html->script('/assets/js/plugins/validation.js')?>
<?=$this->Html->script('/assets/js/plugins/style-switcher.js')?>

        <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCDSb3wORiw36c9kGhpSVqjkTYtJpVp4l4&callback=initMap" async defer></script>
        <script src="assets/js/plugins/google-map.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                App.initParallaxBg();
                FancyBox.initFancybox();
                OwlCarousel.initOwlCarousel();
                StyleSwitcher.initStyleSwitcher();
                RevolutionSlider.initRSfullWidth();
            });

            // Google Map
            function initMap() {
                GoogleMap.initGoogleMap();
            }

        </script>
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.js"></script>
        <script src="assets/plugins/html5shiv.js"></script>
        <script src="assets/plugins/placeholder-IE-fixes.js"></script>
        <![endif]-->
    </body>
</html>
