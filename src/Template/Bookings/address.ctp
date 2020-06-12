<?= $this->Html->css('/assets/css/pages/page_clients.css') ?>
<style>
    ._icon{
        font-size: 16px !important;
        padding-top:4px !important;
        min-width:20px !important;
    }
    .control-label{
        font-weight: 100 !important;
    }
</style>
<div class="flat-testimonials bg-image-v1 parallaxBg margin-bottom-60" style="background-position: 50% -30px;" id="top">
    <div class="container bg-color-light padding-sm">
    
        <?= $this->Form->create($address, ['class' => 'form-horizontal', 'id' => 'frm', 'novalidate' => true, 'style' => 'border: none !important;']) ?>
        <div class="row">
            <div class="col-md-12 text-center" style="border-bottom: 1px dotted #e4e9f0;padding-bottom: 10px;">
                <?= $this->Html->link('<button class="btn-u btn-u-blue" type="button"><i class="glyphicon glyphicon-chevron-left"></i>' . __('Back') . '</button>', ['action' => 'cleaner'], ['escape' => false]) ?>
                <?= $this->Html->link('<button class="btn-u">' . __('Book Now') . ' <i class="glyphicon glyphicon-chevron-right"></i></button>', [], ['escape' => false]) ?>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="headline">
                    <h2><?= __('Your Address') ?></h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-8">
                    <?php foreach ($users['c_addresses'] as $address): ?>

                    <?php endforeach; ?>

                    <div class="col-lg-12">
                        <label for="" class="control-label color-dark"><?= __('Address') ?> <i class="color-red">*</i></label>
                        <?= $this->Form->control('address1', ['label' => false, 'class' => 'form-control', 'required' => 'required']); ?>
                    </div>
                    <div class="col-lg-12">
                        <label for="" class="control-label color-dark"><?= __('Province') ?> <i class="color-red">*</i></label>
                        <div>
                            <?= $this->Form->select('c_province_id', $provinces, ['class' => 'form-control', 'id' => 'province_id']); ?>
                            <?= $this->Form->unlockField('c_province_id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 15px;">
                        <p><?= __('Please mark you location on map') ?></p>
                        <div id="map" class="map margin-bottom-10" style="height: 325px;"></div>
                       
                    </div>
                    <div class="col-lg-6">
                        <?= $this->Form->control('lat', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $this->Form->control('long', ['label' => false, 'class' => 'form-control']); ?>
                    </div>

                </div>

                <div class="col-md-4">
                    <iframe src="<?= SITE_URL ?>bookings/summaryview" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"></iframe>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div><!--/end container-->
</div>

<?= $this->Html->script('booking.js') ?>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?= GOOGLE_MAP_API_KEY ?>&callback=initMap&language=th">
</script>
<script>
    var marker;
    var position;
    var defaultLat = <?= $lat ?>;
    var defaultLong = <?= $long ?>;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: defaultLat, lng: defaultLong}
        });

        //infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                defaultLat = position.coords.latitude;
                defaultLong = position.coords.longitude;
                var pos = {
                    lat: defaultLat,
                    lng: defaultLong
                };

                //infoWindow.setPosition(pos);
                //infoWindow.setContent('Location found.');
                //infoWindow.open(map);
                map.setCenter(pos);

                document.getElementById('lat').value = defaultLat;
                document.getElementById('long').value = defaultLong;

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: {lat: defaultLat, lng: defaultLong}
                });

                map.addListener('mousemove', function () {
                    //console.log(marker.getPosition().lat());
                    //alert(marker.getPosition());
                    position = marker.getPosition();
                    document.getElementById('lat').value = position.lat();
                    document.getElementById('long').value = position.lng();
                });

                //markerOnMap(position.coords.latitude,position.coords.longitude);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());


            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {lat: defaultLat, lng: defaultLong}
            });

            //console.log(map);
            //marker.addListener('click', toggleBounce);
            map.addListener('mouseup', function () {
                //console.log(marker.getPosition().lat());
                //alert(marker.getPosition());
                position = marker.getPosition();
                document.getElementById('lat').value = position.lat();
                document.getElementById('long').value = position.lng();
            });

        }
        //end

    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

    function toggleBounce() {
        //console.log('hi');
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }



    var Validation = function () {
        return {
            //Validation
            initValidation: function () {
                $("#regisfrm").validate({
                    rules:
                            {
                                firstname:
                                        {
                                            required: true
                                        },
                                email:
                                        {
                                            required: true,
                                            email: true
                                        },
                                lastname:
                                        {
                                            required: true
                                        },

                                phone:
                                        {
                                            required: true,
                                            number: true
                                        },
                                address1:
                                        {
                                            required: true
                                        }

                            },

                    // Messages for form validation
                    messages:
                            {
                                required:
                                        {
                                            required: 'Please enter something'
                                        },

                                phone:
                                        {
                                            number: 'Please enter valid Phone No.'
                                        },
                                card_no:
                                        {
                                            number: 'Please enter valid Card No.'
                                        }
                            },

                    // Do not change code below
                    errorPlacement: function (error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });
            }

        };
    }();
    jQuery(document).ready(function () {
        Validation.initValidation();

    });
</script>