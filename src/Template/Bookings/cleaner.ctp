<?= $this->Html->css('/assets/css/pages/page_clients.css') ?>
<style>
    ._icon{
        font-size: 16px !important;
        padding-top:4px !important;
        min-width:20px !important;
    }
</style>
<div class="flat-testimonials bg-image-v1 parallaxBg margin-bottom-60" style="background-position: 50% -30px;">
    <div class="container bg-color-light padding-sm">

        <?= $this->Form->create('booking', ['class' => 'sky-form','id'=>'select_maid_frm', 'novalidate' => true, 'style' => 'border: none !important;']) ?>
        <?= $this->Form->hidden('maid_id',['value'=>'','id'=>'maid_id'])?>
        <?= $this->Form->unlockField('maid_id'); ?>
        <div class="row">
            <div class="col-md-12 text-center" style="border-bottom: 1px dotted #e4e9f0;padding-bottom: 10px;">
                <?=$this->Html->link('<button class="btn-u btn-u-blue" type="button"><i class="glyphicon glyphicon-chevron-left"></i>'.__('Back').'</button>',['action'=>'index'],['escape'=>false])?>
                <?=''//$this->Html->link('<button class="btn-u">'.__('Book Now').' <i class="glyphicon glyphicon-chevron-right"></i></button>',[],['escape'=>false])?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 hidden-desktop hidden-sm hidden-md hidden-lg">
                <iframe src="<?=SITE_URL?>bookings/summaryview" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"></iframe>
            </div>
            <div class="col-md-8">
                <div class="headline">
                    <h2><?= __('Choose your cleaner') ?></h2>
                </div>

               

                <?php if (isset($maids) && !is_null($maids) && sizeof($maids) > 0) { ?>


                    <?php foreach ($maids as $a): ?>
                        <div class="row clients-page">
                            <div class="col-md-2" id="<?= 'img_' . $a->id ?>">
                                <?php
                                $comments = $a->comments;
                                $image = 'noprofile.png';
                                if (isset($a->user->image) && $a->user->image != null && $a->user->image->name != '') {
                                    $image = '/uploads/images/' . $a->user->image->name;
                                }
                                ?>
                                <?= $this->Html->image($image, ['class' => 'img-responsive hover-effect']) ?>
                            </div>
                            <div class="col-md-8">
                                <h3 class="font-thai-prompt" style="margin-bottom: 3px !important;" id="<?= 'name_' . $a->id ?>"><?= h($a->user->firstname . '  ' . $a->user->lastname) ?></h3>
                                <ul class="list-inline" style="margin-bottom: 0px !important;">

                                    <li>
                                        <?php
                                        $rating = 0;
                                        foreach ($comments as $c) :
                                            $rating = $rating + $c->rating;
                                        endforeach;
                                        ?>
                                        <ul class="list-inline product-ratings" style="padding-top: 0px !important;margin-bottom: 0px !important;">
                                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                                <?php if ($rating > $i) { ?>
                                                    <li><i class="rating-selected fa fa-star"></i></li>
                                                <?php } else { ?>
                                                    <li><i class="rating fa fa-star"></i></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </li>

                                </ul>

                                <p><?= h($a->introduce) ?></p>
                            </div>
                            <div class="fcol-md-2 text-right">
                                <button class="btn-u" type="button" name="maid_select" value="<?= $a->id ?>"><?= __('Choose') ?></button>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php } ?>


            </div>
            <div class="col-md-4 hidden-xs">
                <iframe src="<?=SITE_URL?>bookings/summaryview" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"></iframe>
            </div>
        </div>
        <?= $this->Form->end() ?>

    </div><!--/end container-->
</div>
<?= $this->Html->script('booking.js') ?>