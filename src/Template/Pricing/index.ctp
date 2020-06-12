

<!--=== Slider ===-->
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>

            <!-- SLIDE -->
            <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 3">
                <!-- MAIN IMAGE -->
                <?= $this->Html->image('slide/slide_3.jpg', ['data-bgfit' => 'cover', 'data-bgposition' => 'right top', 'data-bgrepeat' => 'no-repeat']) ?>
                <div class="tp-caption revolution-ch3 sft start"
                     data-x="right"
                     data-hoffset="5"
                     data-y="30"
                     data-speed="1500"
                     data-start="500"
                     data-easing="Back.easeInOut"
                     data-endeasing="Power1.easeIn"
                     data-endspeed="300">
                    <strong><?= __('Professional') ?></strong> 
                    <br/><strong><?= __('quality cleaning') ?></strong> 
                    <br/><strong><?= __('with a personal touch') ?></strong> 
                </div>


                <!-- LAYER -->
                <div class="tp-caption sft"
                     data-x="right"
                     data-hoffset="0"
                     data-y="220"
                     data-speed="1600"
                     data-start="2800"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                         <?= $this->Html->link(__('Book Now'), ['controller' => 'bookings'], ['class' => 'btn-u btn-u-lg']) ?>
                </div>
            </li>
            <!-- END SLIDE -->


        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>


<div class="container">
    

    <div class="row margin-bottom-40 pricing-light">
        <div class="headline"><h2><?= __('Main Pachkage Price') ?></h2></div>
        <div class="col-md-3 col-sm-6">
            <div class="pricing hover-effect">
                <div class="pricing-head">
                    <h3><?= __('Single') ?></h3>
                </div>
                <ul class="pricing-content list-unstyled">
                   
                    <li class="bg-color"><?= __('1 time per booking') ?></li>
                    <li><?= __('One hour at a time') ?><i style="color: red !important;">*</i></li>
                    <li class="bg-color"><?= __('.') ?></li>
                    <li><?= __('.') ?></li>
                </ul>
                <div class="pricing-footer">
                    <h4><?= $this->Number->format($appsetting->price_per_hour, ['pattern'=>NUMBER_FORMAT]) ?><i>฿</i> <span><?=__('Per Hour')?></span></h4>
                    <p><?= __('*Can increase the number of hours.') ?></p>
                    <?= $this->Html->link(__('Book Now'), ['controller' => 'bookings'], ['class' => 'btn-u btn-brd btn-brd-hover btn-u-default btn-u-xs']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="pricing hover-effect">
                <div class="pricing-head">
                    <h3><?= __('Monthly') ?></h3>
                </div>
                <ul class="pricing-content list-unstyled">
                    <li class="bg-color"><?= __('Discount ') . $appsetting->discount_percent . '%' ?></li>
                    <li><?= __('1 time per week') ?></li>
                    <li class="bg-color"><?= __('One hour at a time') ?><i style="color: red !important;">*</i></li>
                    <li><?= __('.') ?></li>
                </ul>
                <div class="pricing-footer">
                    <?php $price = ($appsetting->price_per_hour * 4) - ($appsetting->discount_percent / 100 * ($appsetting->price_per_hour * 4));?>
                    <h4><?= $this->Number->format($price, ['pattern'=>NUMBER_FORMAT]) ?><i>฿</i> <span><?=__('Per Month')?></span></h4>
                    <p><?= __('*Can increase the number of hours.') ?></p>
                    <?= $this->Html->link(__('Book Now'), ['controller' => 'bookings'], ['class' => 'btn-u btn-brd btn-brd-hover btn-u-default btn-u-xs']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="pricing hover-effect">
                <div class="pricing-head">
                    <h3><?= __('Monthly Premium') ?></h3>
                </div>
                <ul class="pricing-content list-unstyled">
                    <li class="bg-color"><?= __('Discount ') . $appsetting->discount_percent . '%' ?></li>
                    <li><?= __('2 times per week') ?></li>
                    <li class="bg-color"><?= __('One hour at a time') ?><i style="color: red !important;">*</i></li>
                    <li><?= __('.') ?></li>
                </ul>
                <div class="pricing-footer">
                    <?php $price = ($appsetting->price_per_hour * 8) - ($appsetting->discount_percent / 100 * ($appsetting->price_per_hour * 8))?>
                    <h4><?= $this->Number->format($price, ['pattern'=>NUMBER_FORMAT]) ?><i>฿</i> <span><?=__('Per Month')?></span></h4>
                    <p><?= __('*Can increase the number of hours.') ?></p>
                    <?= $this->Html->link(__('Book Now'), ['controller' => 'bookings'], ['class' => 'btn-u btn-brd btn-brd-hover btn-u-default btn-u-xs']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="pricing hover-effect">
                <div class="pricing-head">
                    <h3><?= __('Holiday Rental') ?></h3>
                </div>
                <ul class="pricing-content list-unstyled">
                   <li class="bg-color"><?= __('1-3 bedrooms Villa') ?></li>
                    <li><?= __('Clening every 3 day') ?></li>
                    <li class="bg-color"><?= __('Contract  1 year') ?></li>
                    <li> <?= __('Annual Deep cleaning') ?></li>
                </ul>
                <div class="pricing-footer">
                    <h4><?=__('6,500')?><i>฿</i> <span><?=__('Per Month')?></span></h4>
                    <p><?= __('icluded all cleaning supplies and chemical.') ?></p>
                    <?= $this->Html->link(__('Book Now'), ['controller' => 'bookings'], ['class' => 'btn-u btn-brd btn-brd-hover btn-u-default btn-u-xs']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-no-space margin-bottom-10">

        <div class="col-md-6">
            <div class="headline"><h2><?= __('Extra Service Price') ?></h2></div>
            <table class="table table-striped" style="font-size: 18px !important;">
                <thead>
                    <tr>
                        <th><?= __('Items') ?></th>
                        <th><?= __('Price/Hour') ?></th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($addons as $a): ?>
                        <?php
                        $name = '';
                        $lang = $this->request->session()->read('Config.language');

                        if ((strpos($lang, "en") === 0) && $a['name_eng'] != null && $a['name_eng'] != '') {
                            $name = $a['name_eng'];
                        } else {
                            $name = $a['name_th'];
                        }
                        ?>
                        <tr>
                            <td><?= h($name) ?></td>
                            <td><?= h($a['price']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <div class="headline"><h2><?= __('Additional') ?></h2></div>

            <div class="tag-box tag-box-v2">


                <p>- <?= __('Deep cleaning(after contruction, move in/out) 1 sq.m =50 baht ') ?>
                    <span class="color-red"><?= __('**included cleaning supplies**') ?></span></p>
                <p>- <?= __('Mirror Cleaning   1 sq.m = 60 baht ') ?>
                    <span class="color-red"><?= __('**included cleaning supplies**') ?></span></p>
                <p>- <?= __('Urgent Daily Cleaner   = 800 baht/day/1cleaner. ') ?>
                    <span class="color-red"><?= __('**Employer need to provide lunch for a cleaner**') ?></span></p>

            </div>

        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        RevolutionSlider.initCusfullWidth();

    });
</script>