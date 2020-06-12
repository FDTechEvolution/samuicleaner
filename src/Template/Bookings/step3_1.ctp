<div class="content-md margin-bottom-30 log-reg-v3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="tag-box tag-box-v3 margin-bottom-40 ">
                    <h2 class="">1.<?= __('Cleaning Detail') ?></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="tag-box tag-box-v2 margin-bottom-40">
                    <h2>2.<?= __('My Information') ?></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="tag-box tag-box-v2 margin-bottom-40 bg-color-green">
                    <h2 class="color-light">3.<?= __('Payment') ?></h2>

                </div>
            </div>

        </div>
        <hr>

        <div class="row">

            <div class="col-md-6 col-md-offset-1">
                <h4><?= __('Booking Information') ?></h4>
                <div class="col-md-12">
                    <div class="tab-v6">
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="profile">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="responsive">
                                            <?php
                                            $profile = "user/user.jpg";
                                            $user = $maid->user;
                                            if ((!(is_null($user->image)) && $user->image != '')) {
                                                $profile = '/uploads/images/' . $user->image->name;
                                            } elseif ((!(is_null($user->profile_image))) && $user->profile_image != '') {
                                                $profile = $user->profile_image;
                                            }
                                            ?>
                                            <?= $this->Html->image($profile, ['class' => 'img-responsive profile-img margin-bottom-20']) ?> 
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h4><?= h($maid->user->firstname . '   ' . $maid->user->lastname) ?></h4>
                                        <p><?= h($maid->introduce) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled specifies-list col-md-6">
                    <li><i class="fa fa-caret-right"></i><?= __('Service') ?>: <span><?= h($service) ?></span></li>
                    <li><i class="fa fa-caret-right"></i><?= __('Date') ?>: <span><?= h($date) ?></span></li>
                    <li><i class="fa fa-caret-right"></i><?= __('Room') ?>: <span><?= h($room) ?></span></li>
                </ul>
                <ul class="list-unstyled specifies-list col-md-6">
                    <li><i class="fa fa-caret-right"></i><?= __('Area') ?>: <span><?= h($area) ?></span></li>
                    <li><i class="fa fa-caret-right"></i><?= __('Time') ?>: <span><?= h($time) ?></span></li>
                    <li><i class="fa fa-caret-right"></i><?= __('Total Hour') ?>: <span><?= h($hour) ?></span></li>
                </ul>


            </div>

            <div class="col-md-4">
                <div class="col-md-12">
                    <div class="col-md-6 text-left">
                        <h3><?= __('Total Hour') ?></h3>
                        <h3><?= __('Rate Per Hour') ?></h3>
                        <h3><?= __('Total Amont') ?></h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <h3><?= h($hour) ?></h3>
                        <h3><?= RATE_PER_HOUR ?></h3>
                        <h3><?= $totalamt ?></h3>
                    </div>

                </div>
                <div class="tag-box tag-box-v3 margin-bottom-40 text-center">


                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="VX42F5K7FPXAA">
                        <input type="hidden" name="lc" value="TH">
                        <input type="hidden" name="item_name" value="Cleaning Service">
                        <input type="hidden" name="item_number" value="SERVICE-01">
                        <input type="hidden" name="amount" value="<?= $totalamt ?>">
                        <input type="hidden" name="currency_code" value="THB">
                        <input type="hidden" name="button_subtype" value="services">
                        <input type="hidden" name="no_note" value="0">
                        <input type="hidden" name="cn" value="เพิ่มคำสั่งพิเศษให้ผู้ขายทราบ:">
                        <input type="hidden" name="no_shipping" value="1">
                        <input type="hidden" name="rm" value="1">
                        <input type="hidden" name="return" value="https://samuicleaner.com/payments/success">
                        <input type="hidden" name="cancel_return" value="https://samuicleaner.com/payments/cancel">
                        <input type="hidden" name="tax_rate" value="0.000">
                        <input type="hidden" name="shipping" value="0.00">
                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHosted">
                        <input type="image" src="https://www.paypalobjects.com/th_TH/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - วิธีชำระเงินแบบออนไลน์ที่ปลอดภัยกว่าและง่ายกว่า!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/th_TH/i/scr/pixel.gif" width="1" height="1">
                    </form>




                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12 text-center">
                <?= $this->Html->link($this->Form->button(__('Back'), ['class' => 'btn-u btn-u-dark', 'type' => 'button']), ['controller' => 'bookings', 'action' => 'step2'], ['escape' => false]) ?>
            </div>
        </div>
    </div>
</div>