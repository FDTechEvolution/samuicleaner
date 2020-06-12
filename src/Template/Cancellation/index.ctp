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
            <div class="col-md-12">
                <div class="headline"><h2><?= __('Conditions and restrictions/Cancellation policy') ?></h2></div>
                <p><?=__('Samuicleaner.com Implement and manage an online platform where customers can book cleaning the house by sending a reservation request through samuicleaner.com. Once the booking is confirmed, and payment completed Samuicleaner.com Requests to send all information to the maid service to clean up by schedule and the most appropriate.')?></p>
            </div>
            <div class="col-md-12">
                <h4><?=__('1. The terms and conditions of the service.')?></h4>
                <ul>
                    <li><?=__('The cleaning service must be booked at least one day in advance.')?></li>
                    <li><?=__('Users will receive confirmation from the maid service within 24 hours or sooner.')?></li>
                    <li><?=__('Users may be denied or cancellation. If the maid is not enough The provider will call you. And the service will not cost you any of this.')?></li>
                    <li><?=__('Users can pay via credit / debit cards only. The system will cut the amount of credit / debit card immediately after the maid had confirmation of the service.')?></li>
                    <li><?=__('If users are not satisfied with the service. Providers offer 100% money back unconditionally. Or offer to clean the site again.')?></li>
                </ul>
                
                <h4><?=__('2. The terms and conditions of the provider.')?></h4>
                <ul>
                    <li><?=__('Any damaged or defective equipment while cleaning. In addition to the responsibility of the provider. Homeowners or consumers can not claim damages from the provider.')?></li>
                    <li><?=__('The only cleaning the bedroom, living room common area, bathroom, kitchen, and balcony.')?></li>
                    <li><?=__('Service providers can reject or cancel the service. If the maid is not enough By providers to inform the subscriber. And the service will not cost you any of this.')?></li>

                </ul>
                
                <h4><?=__('3. Cancellation and refund.')?></h4>
                <ul>
                    <li><?=__('Users may cancel their service. The call provider. The conditions are as follows')?></li>
                    <li><?=__('If you cancel your reservation before the users are confirmed. Users will not charge for any of these cases.')?></li>
                    <li><?=__('If canceled after booking the user is verified. And cancel more than 24 hours before the appointed time, the provider will refund any payments from credit / debit 4% to the ')?></li>
                    <li><?=__('If canceled after booking the user is verified. And cancel appointments at least 24 hours prior to the service provider will return the money to the seller only 50% only.')?></li>
                </ul>
            </div>
        </div>
    </div>
</div>



<script>
    jQuery(document).ready(function () {
        RevolutionSlider.initCusfullWidth();

    });
</script>