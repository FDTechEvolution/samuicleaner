

<!-- JS Implementing Plugins -->
<?=$this->Html->script('/assets/plugins/back-to-top.js')?>
<?=$this->Html->script('/assets/plugins/smoothScroll.js')?>
<?=$this->Html->script('/assets/plugins/jquery.parallax.js')?>
<?=$this->Html->script('/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')?>
<?=$this->Html->script('/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')?>
<?=$this->Html->script('/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')?>
<?=$this->Html->script('/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js')?>
<?=$this->Html->script('/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js')?>

<?=$this->Html->script('/assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')?>
<?=$this->Html->script('/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')?>
<?=$this->Html->script('/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')?>

<!-- JS Customization -->
<?=$this->Html->script('/assets/js/custom.js')?>
<!-- JS Page Level -->
<?=$this->Html->script('/assets/js/plugins/datepicker.js')?>
<?=$this->Html->script('/assets/js/shop.app.js')?>
<?=$this->Html->script('/assets/js/plugins/owl-carousel.js')?>
<?=$this->Html->script('/assets/js/plugins/revolution-slider.js')?>
<script>
    jQuery(document).ready(function () {
        App.init();
        App.initScrollBar();
        App.initParallaxBg();
        OwlCarousel.initOwlCarousel();
        Datepicker.initDatepicker();
        
    });
</script>
<!--[if lt IE 9]>
        <script src="assets/plugins/respond.js"></script>
        <script src="assets/plugins/html5shiv.js"></script>
        <script src="assets/js/plugins/placeholder-IE-fixes.js"></script>
        <![endif]-->
