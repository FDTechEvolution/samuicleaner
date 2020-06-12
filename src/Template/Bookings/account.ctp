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

        <div class="row">
            <div class="col-md-12 text-center" style="border-bottom: 1px dotted #e4e9f0;padding-bottom: 10px;">
                <?= $this->Html->link('<button class="btn-u btn-u-blue" type="button"><i class="glyphicon glyphicon-chevron-left"></i>' . __('Back') . '</button>', ['action' => 'cleaner'], ['escape' => false]) ?>
                <button class="btn-u" type="button" id="bookbt"><?= __('Book Now')?> <i class="glyphicon glyphicon-chevron-right"></i></button>'
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="headline">
                    <h2><?= __('Your Account') ?></h2>
                </div>

                <div class="col-md-8 col-md-offset-2" id="login_box">
                    <?= $this->Form->create('Users', ['novalidate' => true, 'class' => 'log-reg-block sky-form', 'id' => 'sky-form','url'=>['controller'=>'users','action'=>'login','redirect'=>'/bookings/account/']]) ?>
                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Email Address','id'=>'useremail']); ?>
                            </div>
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <?= $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Password']); ?>
                            </div>
                        </label>
                    </section>
                    <div class="row">
                        <div class="col-xs-5 text-center">
                            <?= $this->Form->button(__('Login'), ['class' => 'btn-u btn-u-md btn-u-sea-shop btn-block']) ?>
                        </div>
                        <div class="col-xs-7 text-center">
                            <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div>
                        </div>
                    </div>
                    <div class="row margin-bottom-5">

                        <div class="col-xs-6 text-left">
                            <?= $this->Html->link(__('Forget your Password?'), ['controller' => 'users', 'action' => 'forgot'], ['class' => 'color-green']) ?>
                        </div>
                    </div>

                    <?= $this->Form->end() ?>

                    <div class="col-md-12 text-center">
                        <h3><?= __('OR') ?></h3>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn-u" type="button" id="create_account"><?= __('Create Account') ?></button>
                    </div>
                </div>




                <div class="col-md-12" id="regis_box" style="display: none;">
                    <?= $this->Form->create('account', ['class' => 'form-horizontal', 'id' => 'regisfrm', 'novalidate' => true, 'style' => 'border: none !important;']) ?>
                    <div class="col-lg-6">
                        <label for="inputEmail1" class="control-label color-dark"><?= __('Firstname') ?> <i class="color-red">*</i></label>
                        <?= $this->Form->control('firstname', ['label' => false, 'class' => 'form-control', 'required' => 'required']); ?>
                    </div>

                    <div class="col-lg-6">
                        <label for="inputEmail1" class="control-label color-dark"><?= __('Lastname') ?> <i class="color-red">*</i></label>
                        <?= $this->Form->control('lastname', ['label' => false, 'class' => 'form-control', 'required' => 'required']); ?>

                    </div>

                    <div class="col-lg-6">
                        <label for="inputEmail1" class="control-label color-dark"><?= __('Phone') ?> <i class="color-red">*</i></label>
                        <?= $this->Form->control('phone', ['label' => false, 'class' => 'form-control', 'required' => 'required']); ?>

                    </div>
                    <div class="col-lg-6">
                        <label for="inputEmail1" class="control-label color-dark"><?= __('Email') ?> <i class="color-red">*</i></label>
                        <?= $this->Form->control('email', ['label' => false, 'class' => 'form-control', 'required' => 'required']); ?>

                    </div>
                    <div class="col-lg-12">
                        <label for="inputEmail1" class="control-label color-dark"><?= __('Address') ?> <i class="color-red">*</i></label>
                        <?= $this->Form->control('address1', ['label' => false, 'class' => 'form-control', 'required' => 'required']); ?>
                    </div>
                    <div class="col-lg-12">
                        <label for="inputEmail1" class="control-label color-dark"><?= __('Province') ?> <i class="color-red">*</i></label>
                        <div>
                            <?= $this->Form->select('c_province_id', $provinces, ['class' => 'form-control', 'id' => 'province_id']); ?>
                            <?= $this->Form->unlockField('c_province_id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 15px;">
                        <p><?= __('Please mark you location on map') ?></p>
                        <div id="map" class="map margin-bottom-10" style="height: 325px;"></div>
                        <?= $this->Form->hidden('position', ['label' => false, 'id' => 'position']); ?>
                        <?= $this->Form->unlockField('position'); ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $this->Form->control('latitude', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $this->Form->control('longitude', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>


            </div>
            <div class="col-md-4">
                <iframe src="<?= SITE_URL ?>bookings/summaryview" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"></iframe>
            </div>

        </div>


    </div><!--/end container-->
</div>
<div id="fb-root"></div>

<?= $this->Html->script('facebook-login.js')?>
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

                document.getElementById('latitude').value = defaultLat;
                document.getElementById('longitude').value = defaultLong;

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
                    document.getElementById('latitude').value = position.lat();
                    document.getElementById('longitude').value = position.lng();
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
                document.getElementById('latitude').value = position.lat();
                document.getElementById('longitude').value = position.lng();
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
        $('#bookbt').on('click',function(){
            $('#regisfrm').submit();
        });
    });
</script>