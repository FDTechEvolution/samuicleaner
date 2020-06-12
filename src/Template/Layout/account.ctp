<!DOCTYPE html>
<html>
    <head>
        <?= $this->element('Layout/inc_header_asset'); ?>
        <?= $this->Html->css('/assets/css/pages/profile.css') ?>
    </head>

    <body>
        <div class="wrapper">
            <?= $this->element('Layout/inc_header'); ?>
            <?php if(isset($title)){?>
            <div class="breadcrumbs">
                <div class="container content">
                   
                    
                </div>
            </div>
            <?php }?>

            <!--=== Content ===-->
            <div class="container content">
                <?= $this->Flash->render() ?>
                <div class="row profile">
                    <!--Left Sidebar-->
                    <div class="col-md-3 md-margin-bottom-40">
                        <?= $this->element('Layout/account/inc_account_leftbar'); ?>
                    </div>
                    <div class="col-md-9">
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
                
            </div>
            <!--=== End Content ===-->

            <?= $this->element('Layout/inc_footer'); ?>
        </div>
        <!--<? $this->element('Layout/inc_switcher'); ?>-->
        <?= $this->element('Layout/inc_footer_asset'); ?>
    </body>
</html>