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

<!--=== End Slider ===-->
<div class="log-reg-v3 content-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-grey margin-bottom-40">

                    <div class="panel-body">
                        <table class="table table-hover text-center">
                            <thead style="background-color: #2ecc71;color: #FFFFFF;">
                                <tr>
                                    <th rowspan="2" valign="top" class="text-center" style="vertical-align: top;"><?= __('Size/Area (Square meter)') ?></th>
                                    <th rowspan="2" class="text-center" style="vertical-align: top;"><?= __('Number of room') ?></th>
                                    <th rowspan="2" class="text-center" style="vertical-align: top;"><?= __('Number of Hours') ?></th>
                                    <th rowspan="2" class="text-center" style="vertical-align: top;"><?= __('Single Booking Price**') ?></th>
                                    <th colspan="2" class="text-center" style="vertical-align: top;"><?= __('Monthly Booking Price**') ?></th>
                                </tr>
                                <tr >
                                    <th class="text-center"><?= __('once/week') ?></th>
                                    <th class="text-center"><?= __('2 times/week') ?></th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 18px;">
                                <?php foreach ($prices as $value): ?>
                                <tr>
                                    <td><?=$value['size']?></td>
                                    <td><?=$value['room']?></td>
                                    <td><?=$value['hour']?></td>
                                    <td><?=($value['hour']*$value['price'])?>฿</td>
                                    <td><?=($value['hour']*$value['price'])*4?>฿</td>
                                    <td><?=($value['hour']*$value['price'])*8?>฿</td>
                                </tr>
                                <?php endforeach; ?>
                               

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="col-md-12">
                    <div class="headline"><h4>Foreign Exchange Rate</h4></div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <td><?=__('Currency')?></td>
                                <td><?=__('Exchange')?></td>
                            </tr>
                           
                        </thead>
                        <tbody>
                            <?php foreach ($convertionRates as $rate): ?>
                            <tr>
                                <td><image src="<?= $rate['icon'] ?>" width="25px"/> <?= $rate['base'] ?></td>
                                <td><?= $rate['rates']['THB'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                      
                </div>

            </div>

            
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        RevolutionSlider.initCusfullWidth();

    });
</script>