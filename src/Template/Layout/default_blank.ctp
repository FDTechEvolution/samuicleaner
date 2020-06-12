<!DOCTYPE html>
<html>
    <head>
        <?= $this->element('Layout/inc_header_asset'); ?>
        <?= $this->Html->css('/assets/css/pages/page_job_inner.css') ?>
        <?= $this->Html->css('/assets/css/pages/page_job.css') ?>
    </head>

    <body>
        <div class="wrapper">
            <?= $this->element('Layout/inc_header'); ?>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <!--=== End Content ===-->

        </div>
        <?= $this->element('Layout/inc_footer'); ?>
        <!--<? $this->element('Layout/inc_switcher'); ?>-->
        <?= $this->element('Layout/inc_footer_asset'); ?>
    </body>
</html>