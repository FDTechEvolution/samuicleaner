<!--=== Slider ===-->
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>

            <!-- SLIDE -->
            <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 3">
                <!-- MAIN IMAGE -->
                <?= $this->Html->image('slide/samui_home_1.jpg', ['data-bgfit' => 'cover', 'data-bgposition' => 'right top', 'data-bgrepeat' => 'no-repeat']) ?>
                <div class="tp-caption revolution-ch3 sft start"
                     data-x="right"
                     data-hoffset="5"
                     data-y="110"
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
                     data-y="300"
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


<div class="container content-sm">
    <div class="row margin-bottom-40">
        <div class="col-md-12 text-center">
            <h2 class="text-primary"><?= __('Get a Cleaner in 3 easy steps') ?></h2>
        </div>
        <div class="col-md-4 content-boxes-v6 md-margin-bottom-50">
            <i class="rounded-x glyphicon glyphicon-calendar"></i>
            <h1 class="title-v3-md text-uppercase margin-bottom-10">
                <?= __('Make a Booking') ?>
            </h1>
            <p><?= __('Tell us about yourself and your home, so that you can find a cleaner that best suits you. Need advance 1 day') ?></p>
        </div>
        <div class="col-md-4 content-boxes-v6 md-margin-bottom-50">
            <i class="rounded-x glyphicon glyphicon-usd"></i>
            <h2 class="title-v3-md text-uppercase margin-bottom-10">
                <?= __('Get a Cleaner and Online payment') ?>
            </h2>
            <p><?= __('An insured and trusted cleaner will clean your place. After Confirm payment online') ?></p>
        </div>
        <div class="col-md-4 content-boxes-v6">
            <i class="rounded-x glyphicon glyphicon-thumbs-up"></i>
            <h2 class="title-v3-md text-uppercase margin-bottom-10">
                <?= __('Enjoy Your Clean Home') ?>
            </h2>
            <p><?= __('Sit back and relax. We will take care of the rest. All booking detail will forward by your e-mail.') ?></p>
        </div>
    </div>


    <div class="clearfix margin-bottom-20"><hr></div>

    <div class="heading heading-v1 margin-bottom-10">
        <h2 class="text-primary"><?= __('Latest Our cleaner') ?></h2>
    </div>
    <?php $i = 1; ?>
    <?php foreach ($maids as $maid): ?>

        <?php if ($i % 4 == 0 || $i == 1) { ?>
            <div class="row">
            <?php } ?>
            <div class="col-md-4">
                <div class="carousel slide testimonials testimonials-v1" id="testimonials-2">
                    <div class="carousel-inner">
                        <div class="item active">
                            <p class="rounded">
                                <?php
                                $initro = '';
                                $lang = $this->request->session()->read('Config.language');

                                if ((strpos($lang, "en") === 0) && $maid->introduce_en != null && $maid->introduce_en != '') {
                                    $initro = $maid->introduce_en;
                                } else {
                                    $initro = $maid->introduce;
                                }
                                ?>
                                <?= h($initro) ?>
                            </p>
                            <?php
                            $profile = "noprofile.png";
                            if (!(is_null($maid->user->image_id) || $maid->user->image_id == '')) {
                                $profile = '/uploads/images/' . $maid->user->image->name;
                            }
                            ?>
                            <div class="testimonial-info">
                                <?= $this->Html->link($this->Html->image($profile, ['class' => 'rounded-x']), ['controller' => 'maids', 'action' => 'view', $maid->id], ['escape' => false]) ?>
                                <span class="testimonial-author">
                                    <?= $this->Html->link(h($maid['user']['fullname_' . $lang]), ['controller' => 'maids', 'action' => 'view', $maid->id], ['escape' => false]) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (($i % 3 == 0 && $i != 1 ) || $i == sizeof($maids)) { ?>
            </div>
        <?php } ?>
        <?php $i++; ?>
    <?php endforeach; ?>

    <div class="row">
        <div class="col-md-12">
            <div id="map" class="map margin-bottom-50"></div>
        </div>
    </div>


    <div class="heading heading-v1 margin-bottom-10">
        <h2 class="text-primary"><?= __('What our customers say') ?></h2>
    </div>

    <div class="row margin-bottom-40">
        <?php foreach ($reviews as $review) : ?>
            <div class="col-md-3">
                <div class="carousel slide testimonials testimonials-v1" id="testimonials-2">
                    <div class="carousel-inner">
                        <div class="item active">
                            <p class="rounded">
                                <?= h($review->description) ?>
                            </p>
                            <div class="testimonial-info">
                                <?php
                                $image_path = $review->has('image') ? '/uploads/images/' . $review->image->name : 'noprofile.png';
                                ?>
                                <?= $this->Html->image($image_path, ['class' => 'rounded-x']); ?>
                               
                                <span class="testimonial-author">
                                    <?= h($review->name) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>

    <!--=== Sponsors ===-->
    <div class="container content">
        <div class="heading heading-v1 margin-bottom-40">
            <h2 class="text-primary"><?= __('Our Customer') ?></h2>

        </div>

        <ul class="list-inline owl-slider-v2">
            <?php foreach ($customers as $customer): ?>
                <li class="item first-child">
                    <?php
                    $image_path = $customer->has('image') ? '/uploads/images/' . $customer->image->name : 'noprofile.png';
                    ?>
                    <?= $this->Html->link($this->Html->image($image_path, ['class' => '']), $customer->url, ['escape' => false, 'target' => '_blank']) ?>
                </li>
            <?php endforeach; ?>

        </ul><!--/end owl-carousel-->
    </div>
    <!--=== End Sponsors ===-->

</div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?= GOOGLE_MAP_API_KEY ?>&callback=initMap">
</script>
<script>
    jQuery(document).ready(function () {
        RevolutionSlider.initRSfullWidth();

    });
</script>

<script type="text/javascript">
    var locations = <?php echo json_encode($maidMaps, JSON_PRETTY_PRINT) ?>;

    var locations_ = [
        ['Bondi Beach', 9.159462, 99.26970400000005, 4],
        ['Coogee Beach', -33.923036, 151.259052, 5],
        ['Cronulla Beach', -34.028249, 151.157507, 3],
        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];

    var defaultLat = <?= $lat ?>;
    var defaultLong = <?= $long ?>;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: {lat: defaultLat, lng: defaultLong}
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;
        //var image = '/Dropbox/samuicleaner/front/img/user/img4.jpg';

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                title: locations[i][0],
                //icon: image
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                };
            })(marker, i));
        }
    }

</script>
