<div class="content-md margin-bottom-30 log-reg-v3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="tag-box tag-box-v3 margin-bottom-40 ">
                    <h2 class="">1.<?= __('Cleaning Detail') ?></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="tag-box tag-box-v2 margin-bottom-40 bg-color-green">
                    <h2 class="color-light">2.<?= __('My Information') ?></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="tag-box tag-box-v2 margin-bottom-40">
                    <h2>3.<?= __('Payment') ?></h2>

                </div>
            </div>

        </div>
        <hr>

        <?= $this->Form->create($user, ['class' => 'sky-form', 'novalidate' => true, 'name' => 'frm','id'=>'user_address', 'style' => 'border: none !important;']) ?>
        <div class="row">

            <div class="col-md-5">
                <h4><?= __('Personal Infomation') ?></h4>
           
                <?php if(is_null($user->id) || $user->id == ''){?>
                <div class="row columns-space-removes">
                    
                    <div class="col-lg-6 col-lg-offset-3 margin-bottom-10">
                        <?=
                        $this->Html->link(
                            '<button class="btn-u btn-u-md btn-u-fb btn-block" type="button"><i class="fa fa-facebook"></i> Facebook Log In</button>', ['controller' => 'facebook', 'action' => 'login','c'=>'bookings','a'=>'step2'], ['escape' => false])
                            ?>

                    </div>

                </div>
                    <div class="border-wings">
                        <span>or</span>
                    </div>
                    <?php } ?>
                    <section >
                        <label class="input">
                            <?= $this->Form->control('firstname', ['label' => false,'placeholder' => __('First Name'), 'required' => 'required']); ?>
                        </label>
                    </section>
                    <section >
                        <label class="input">
                            <?= $this->Form->control('lastname', ['label' => false, 'placeholder' => __('Last Name'), 'required' => 'required']); ?>
                        </label>
                    </section>
                    <section >
                        <label class="input">
                            <?= $this->Form->control('phone', ['label' => false, 'placeholder' => __('Phone'), 'required' => 'required']); ?>
                        </label>
                    </section>
                    <section >
                        <label class="input">
                            <?= $this->Form->control('email', ['label' => false, 'placeholder' => __('Email')]); ?>
                        </label>
                    </section>
                    <?php if(is_null($user->password) || $user->password ==''){?>
                    <section >
                        <label class="input">
                            <?= $this->Form->control('password', ['label' => false, 'placeholder' => __('Password'), 'required' => 'required']); ?>
                        </label>
                    </section>
                    <?php } ?>
              
                </div>

                <div class="col-md-7">
                    <h4><?= __('Address') ?></h4>
                    <div class="col-md-12">
                        <section class="">
                            <label class="input">
                                <?= $this->Form->hidden('c_addresses.0.id', ['label' => false]); ?>
                                <?= $this->Form->hidden('c_addresses.0.seq', ['label' => false]); ?>
                                <?= $this->Form->control('c_addresses.0.address1', ['label' => false,'id'=>'address']); ?>
                            </label>
                        </section>

                        <?= $this->Form->hidden('position', ['id' => 'position']) ?>
                        <?= $this->Form->unlockField('position') ?>
                    </div>

                    <div class="col-md-12">
                    <p><?=__('Please mark you location on map')?></p>
                        <div id="map" class="map margin-bottom-50"></div>
                    </div>
                </div>
                <div class="row text-center">
                    <section>
                        <?= $this->Html->link($this->Form->button(__('Back'), ['class' => 'btn-u btn-u-dark', 'type' => 'button']), ['controller' => 'bookings','action'=>'index'], ['escape' => false]) ?>
                        <?= $this->Form->button(__('Save and Next'), ['class' => 'btn-u']) ?>
                    </section>
                </div>

            </div>


            <?= $this->Form->end() ?>

        </div>
    </div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?=GOOGLE_MAP_API_KEY?>&callback=initMap&language=th">
</script>
<script>
    var marker;
    var position;
    var defaultLat = <?= $lat ?>;
    var defaultLong = <?= $long ?>;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: {lat: defaultLat, lng: defaultLong}
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: defaultLat, lng: defaultLong}
        });

        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        //console.log(map);
        //marker.addListener('click', toggleBounce);
        map.addListener('mouseup', function () {
            //console.log(marker.getPosition());
            //alert(marker.getPosition());
            position = marker.getPosition();
            document.getElementById('position').value = position;
            geocodeLatLng(geocoder, map, infowindow,marker);

        });

    }

    function geocodeLatLng(geocoder, map, infowindow,marker) {
        var input = document.getElementById('position').value;
        input = input.replace("(", "");
        input = input.replace(")", "");
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[1]) {
              infowindow.setContent(results[1].formatted_address);
              //console.log(results);
              document.getElementById('address').value = results[1].formatted_address;
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }

    function toggleBounce() {
        //console.log('hi');
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
</script>


<script>
    var Validation = function () {
        return {
            //Validation
            initValidation: function () {
                $("#user_address").validate({
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
                                url:
                                        {
                                            required: true,
                                            url: true
                                        },
                                date:
                                        {
                                            required: true,
                                            date: true
                                        },
                                min:
                                        {
                                            required: true,
                                            minlength: 5
                                        },
                                max:
                                        {
                                            required: true,
                                            maxlength: 5
                                        },
                                range:
                                        {
                                            required: true,
                                            rangelength: [5, 10]
                                        },
                                digits:
                                        {
                                            required: true,
                                            digits: true
                                        },
                                phone:
                                        {
                                            required: true,
                                            number: true
                                        },
                                card_no:
                                        {
                                            number: true
                                        },
                                minVal:
                                        {
                                            required: true,
                                            min: 5
                                        },
                                maxVal:
                                        {
                                            required: true,
                                            max: 100
                                        },
                                rangeVal:
                                        {
                                            required: true,
                                            range: [5, 100]
                                        }
                            },

                    // Messages for form validation
                    messages:
                            {
                                required:
                                        {
                                            required: 'Please enter something'
                                        },
                                firstname:
                                        {
                                            required: 'Please enter your email address'
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