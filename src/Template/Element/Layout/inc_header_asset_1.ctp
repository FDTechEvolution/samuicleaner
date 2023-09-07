<title>Samui cleaning service: think clean Think maid to order <?= $this->fetch('title') ?></title>

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicon -->
<?= $this->Html->meta('icon') ?>

<!-- Web Fonts -->
<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,800&amp;subset=cyrillic,latin'>

<!-- CSS Global Compulsory -->
<?= $this->Html->css('/assets/plugins/bootstrap/css/bootstrap.min.css') ?>
<?= $this->Html->css('/assets/css/shop.style.css') ?>
<?= $this->Html->css('style.css') ?>


<!-- CSS Header and Footer -->
<?=''// $this->Html->css('/assets/css/headers/header-v5.css') ?>

<?= $this->Html->css('/assets/css/footers/footer-v4.css') ?>


<?= $this->Html->css('/assets/css/pages/page_pricing.css') ?>
<?= $this->Html->css('/assets/css/pages/pricing/pricing_v6.css') ?>
<?= $this->Html->css('/assets/css/pages/pricing/pricing_v7.css') ?>
<?= $this->Html->css('/assets/css/pages/pricing/pricing_v8.css') ?>

<!-- CSS Implementing Plugins -->
<?= $this->Html->css('/assets/plugins/animate.css') ?>
<?= $this->Html->css('/assets/plugins/line-icons/line-icons.css') ?>
<?= $this->Html->css('/assets/plugins/font-awesome/css/font-awesome.min.css') ?>
<?= $this->Html->css('/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css') ?>
<?= $this->Html->css('/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') ?>
<?= $this->Html->css('/assets/plugins/revolution-slider/rs-plugin/css/settings.css') ?>
<?= $this->Html->css('/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css') ?>
<?= $this->Html->css('/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css') ?>
<!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->


<!-- CSS Theme -->
<?= $this->Html->css('/assets/css/theme-colors/default.css', ['id' => 'style_color']) ?>

<!-- CSS Page Style -->
<?= $this->Html->css('/assets/css/pages/log-reg-v3.css') ?>

<!-- CSS Customization -->
<?= $this->Html->css('/assets/css/custom.css') ?>
<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<?= $this->Html->script('/assets/plugins/jquery/jquery.min.js') ?>
<?= $this->Html->script('/assets/plugins/jquery/jquery-migrate.min.js') ?>
<?= $this->Html->script('/assets/plugins/bootstrap/js/bootstrap.min.js') ?>
<script>
    var SITE_URL = '<?=SITE_URL?>';
</script>