
<?= $this->Html->css('/assets/css/pages/page_clients.css') ?>
<style>
    ._icon{
        font-size: 16px !important;
        padding-top:4px !important;
        min-width:20px !important;
    }
</style>
<div class="flat-testimonials bg-image-v1 parallaxBg margin-bottom-60" style="background-position: 50% -30px;" id="top">
    <div class="container bg-color-light padding-sm">


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="headline">
                    <h2><?= __('Payment Detail') ?></h2>
                </div>
                <div class="col-md-4 texta-right">


                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="VX42F5K7FPXAA">
                        <input type="hidden" name="lc" value="TH">
                        <input type="hidden" name="item_name" value="Cleaning Service">
                        <input type="hidden" name="item_number" value="SERVICE-01">
                        <input type="hidden" name="amount" value="<?= $payment['amount'] ?>">
                        <input type="hidden" name="currency_code" value="THB">
                        <input type="hidden" name="button_subtype" value="services">
                        <input type="hidden" name="no_note" value="0">
                        <input type="hidden" name="cn" value="เพิ่มคำสั่งพิเศษให้ผู้ขายทราบ:">
                        <input type="hidden" name="no_shipping" value="1">
                        <input type="hidden" name="rm" value="2">
                        <input type="hidden" name="return" value="https://samuicleaner.com/payments/processing/<?= $payment['id'] ?>">

                        <input type="hidden" name="cancel_return" value="https://samuicleaner.com/payments/cancel">
                        <input type="hidden" name="tax_rate" value="0.000">
                        <input type="hidden" name="shipping" value="0.00">
                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHosted">

                        <input type="image" src="https://www.paypalobjects.com/th_TH/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - วิธีชำระเงินแบบออนไลน์ที่ปลอดภัยกว่าและง่ายกว่า!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/th_TH/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </div>

                <div class="col-md-8 text-left">
                    <?php $booking = $payment['booking'] ?>
                    <ul class="list-unstyled invoice-total-info color-dark" style="font-size: 18px;">
                        <li><strong><i class="icon-calendar _icon"></i> <?= _('Booking No.') ?>:</strong> <?= $booking['bookingno'] ?></li>
                        <li><strong><i class="icon-calendar _icon"></i> <?= _('Package') ?>:</strong> <?= $booking['package'] ?></li>
                        <li><strong><i class="icon-calendar _icon"></i> <?= _('Area') ?>:</strong> <?= $booking['service_area'] ?></li>
                        <?php if (isset($booking['date']) && $booking['date'] != null && $booking['date'] != '') { ?>
                            <li><strong><i class="icon-calendar _icon"></i> <?= _('Date') ?>:</strong> <?= $booking['date'] ?></li>
                        <?php } ?>
                        <?php if (isset($booking['hour']) && $booking['hour'] != null && $booking['hour'] != '') { ?>
                            <li><strong><i class="icon-hourglass _icon"></i> <?= _('Hour') ?>:</strong> <?= $booking['hour'] ?></li>
                        <?php } ?>
                        
                        <li style="font-size: 19px;"><strong><?= __('Total') ?>:</strong> <?= $payment['amount'] ?> <?= __('Baht') ?></li>
                    </ul>
                </div>
                <?php //debug($payment);?>



            </div>

        </div>

    </div><!--/end container-->
</div>
<?= $this->Html->script('booking.js') ?>