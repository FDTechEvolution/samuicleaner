<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en"> <!--<![endif]-->
    <head>
        <?= $this->element('Layout/inc_header_asset'); ?>
    </head>

    <body class="header-fixed bg-color-light" id="div_body">
        <div id="page-load" style="display: none;" class="page_loader">
            <?= $this->Html->image('page_loading.gif', ['style' => 'opacity:1.0;']) ?>
        </div>
        <?= $this->fetch('content') ?>

        <?= $this->element('Layout/inc_footer_asset'); ?>
        <script>


            $(document).ready(function () {
                $(window).bind("beforeunload", function () {
                    $('#page-load').show();
                });


            });
        </script>
    </body>
</html>
