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

<div class="container content-md">
    <div class="row team">
        <div class="col-sm-3">
            <div class="thumbnail-style">
                <h3><?= __('Bedroom') ?></h3>
                <?= $this->Html->image('room/bedroom.jpg', ['class' => 'img-responsive']) ?>
                
                <ul>
                    <li><?= __('Bed linen or linen pillowcases.') ?></li>
                    <li><?= __('Wipe down and clean the ground floor.') ?></li>
                    <li><?= __('Clean all dust spots accessible.') ?></li>
                    <li><?= __('Wipe mirrors, lamps and furniture made of glass.') ?></li>
                    <li><?= __('Deployment Appliance designated as the owner.') ?></li>
                    <li><?= __('Change the trash bag and left to waste away.') ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail-style">
                <h3><?= __('Bathroom') ?></h3>
                <?= $this->Html->image('room/bathroom.jpg', ['class' => 'img-responsive']) ?>
                
                <ul>
                    <li><?= __('Clean the bathroom sink, bathtub and shower.') ?></li>
                    <li><?= __('Clean all dust spots accessible.') ?></li>
                    <li><?= __('Wipe the glass and furniture made of glass.') ?></li>
                    <li><?= __('Clean the bathroom floor') ?></li>
                    <li><?= __('Deployment Appliance designated as the owner.') ?></li>
                    <li><?= __('Change the trash bag and left to waste away.') ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail-style">
                <h3><?= __('Living room') ?></h3>
                <?= $this->Html->image('room/livingroom.jpg', ['class' => 'img-responsive']) ?>
                
                <ul>
                    <li><?= __('Dust cleaner Showcase TV appliances in the room.') ?></li>
                    <li><?= __('Wipe down and clean the ground floor.') ?></li>
                    <li><?= __('Clean all dust spots accessible.') ?></li>
                    <li><?= __('Wipe mirrors, lamps and furniture made of glass.') ?></li>
                    <li><?= __('Deployment Appliance designated as the owner.') ?></li>
                    <li><?= __('Change the trash bag and left to waste away.') ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail-style">
                <h3><?= __('Kitchen and balcony') ?></h3>
                <?= $this->Html->image('room/kitchenroom.jpg', ['class' => 'img-responsive']) ?>
                
                <ul>
                    <li><?= __('Dust cleaning glass dish spoon.') ?></li>
                    <li><?= __('Clean all dust spots accessible.') ?></li>
                    <li><?= __('Wash and storage containers And cleaning the sink') ?></li>
                    <li><?= __('Wipe dirt area, gas stove, microwave and refrigerator.') ?></li>
                    <li><?= __('Clean the kitchen floor') ?></li>
                    <li><?= __('Deployment Appliance designated as the owner.') ?></li>
                    <li><?= __('Change the trash bag and left to waste away.') ?></li>
                    <li><?= __('Clean balcony') ?></li>
                    <li><?= __('Watering a tree') ?></li>
                </ul>
                
            </div>
        </div>
    </div>
    <div class="row team">
        <div class="col-sm-3">
            <?= $this->Html->link(__('Book Now'), ['controller'=>'bookings'], ['class' => 'btn-u btn-u-lg btn-block']) ?>
        </div>
        <div class="col-sm-3">
            <?= $this->Html->link(__('Book Now'), ['controller'=>'bookings'], ['class' => 'btn-u btn-u-lg btn-block']) ?>
        </div>
        <div class="col-sm-3">
            <?= $this->Html->link(__('Book Now'), ['controller'=>'bookings'], ['class' => 'btn-u btn-u-lg btn-block']) ?>
        </div>
        <div class="col-sm-3">
            <?= $this->Html->link(__('Book Now'), ['controller'=>'bookings'], ['class' => 'btn-u btn-u-lg btn-block']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="headline"><h2><?= __('Remark') ?></h2></div>
            <ul>
                <li><?= __('For a clearer view of the necessary requirements, please speak with your cleaner directly.') ?></li>
                <li><?= __('Our service excludes these activities as follows:Big cleaning, Exterior window cleaning, Deep stain removal, Infestation, Mold removal, Insect removal') ?></li>
                <li><?= __('We recommend to have the following cleaning supplies at Villa or home: (If not, please inform at booking form)') ?>
                    <ul>
                        <li><?= __('1 vacuum cleaner/broom and 1 mop ') ?></li>
                        <li><?= __('4 cleaning cloths ') ?></li>
                        <li><?= __('1 feather duster ') ?></li>
                        <li><?= __('1 scratch-free sponge ') ?></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

</div>

<script>
    jQuery(document).ready(function () {
        RevolutionSlider.initCusfullWidth();

    });
</script>