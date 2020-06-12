
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
</div>