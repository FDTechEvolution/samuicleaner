<div class="row">
    <div class="col-lg-8">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Basic elements
            </div>
            <div class="panel-body" style="display: block;">
                <?= $this->Form->create($maid, ['class' => '', 'novalidate' => true]) ?>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class=""><?= __('Full Name Thai') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->control('user.fullname_th', ['label' => false, 'class' => 'form-control input-sm']); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label class=""><?= __('Full Name Eng') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->control('user.fullname_en', ['label' => false, 'class' => 'form-control input-sm']); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label class=""><?= __('Card No') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->control('user.card_no', ['label' => false, 'class' => 'form-control input-sm']); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class=""><?= __('Phone') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->control('user.phone', ['label' => false, 'class' => 'form-control input-sm']); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label class=""><?= __('Email') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->control('user.email', ['label' => false, 'class' => 'form-control input-sm']); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label class=""><?= __('Line ID') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->control('user.lineid', ['label' => false, 'class' => 'form-control input-sm']); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-8 no-padding">
                        <label class="col-md-12"><?= __('Birth Day') ?> <span class="color-red">*</span></label>
                        <div class="form-group col-md-3">
                            <?= $this->Form->select('birthday_day', $dayNo, ['default' => $birthday_day, 'class' => 'form-control input-sm']); ?>
                        </div>
                        <div class="form-group col-md-5">
                            <?= $this->Form->select('birthday_month', $monthTH, ['default' => $birthday_month, 'class' => 'form-control input-sm']); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <?= $this->Form->select('birthday_year', $years, ['default' => $birthday_year, 'class' => 'form-control input-sm']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class=""><?= __('Introduce Thai') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->textarea('introduce', ['label' => false, 'required' => 'required', 'class' => 'form-control input-sm']); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label class=""><?= __('Introduce Eng') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->textarea('introduce_en', ['label' => false, 'required' => 'required', 'class' => 'form-control input-sm']); ?>
                    </div>
                </div>
                <div class="row margin-bottom-10">
                    <h4><?= __('Cleaner Location') ?></h4>
                    <p><?= __('Please mark you location on map') ?></p>
                    <div class="form-group col-md-12">
                        <?= $this->Form->control('user.c_addresses.0.address1', ['label' => false, 'id' => 'address', 'class' => 'form-control input-sm']); ?>
                    </div>
                    <div class="form-group col-md-12">
                        <div id="map" class="map"></div>
                        <?= $this->Form->hidden('position', ['label' => false, 'id' => 'position']); ?>
                        <?= $this->Form->hidden('user.c_addresses.0.id', ['label' => false]); ?>

                        <?php
                        $address = $maid['user']['c_addresses'][0];
                        $lat = $address['lat'];
                        $long = $address['long'];
                        if ($lat == null || $lat == '' || $long == null || $long == '') {
                            $lat = 9.544042;
                            $long = 100.059551;
                        }
                        ?>
                    </div>

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
                                zoom: 8,
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
                                geocodeLatLng(geocoder, map, infowindow, marker);
                            });

                        }

                        function geocodeLatLng(geocoder, map, infowindow, marker) {
                            var input = document.getElementById('position').value;
                            input = input.replace("(", "");
                            input = input.replace(")", "");
                            var latlngStr = input.split(',', 2);
                            var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
                            geocoder.geocode({'location': latlng}, function (results, status) {
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
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <?= $this->Form->button(__('Save'), ['class' => 'btn w-xs btn-success']) ?>
                    </div>

                </div>


                <?= $this->Form->end() ?>
            </div>
        </div>

    </div>

    <div class="col-lg-4">
        <div class="col-lg-12 no-padding">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    เปลี่ยนรูปโปรไฟล์
                </div>
                <div class="panel-body text-center" style="display: block;">
                    <?php
                    $profile = "user/user.jpg";
                    if ((!(is_null($maid->user->image)) && $maid->user->image != '')) {
                        $profile = '/uploads/images/' . $maid->user->image->name;
                    } elseif ((!(is_null($maid->user->profile_image))) && $maid->user->profile_image != '') {
                        $profile = $maid->user->profile_image;
                    }
                    ?>
                    <?= $this->Html->image($profile, ['class' => 'img-circle m-b img-responsive']) ?> 

                    <?=
                    $this->Form->create('authen', [
                        'class' => '', 'enctype' => 'multipart/form-data',
                        'novalidate' => true,
                        'url' => ['controller' => 'adminmaid', 'action' => 'changeprofile', $maid->id, $maid->user->id]])
                    ?>
                    <div class="form-group col-md-12">
                        <?= $this->Form->control('image', ['type' => 'file', 'label' => false, 'class' => '']); ?>
                    </div>
                    <?= $this->Form->button(__('Upload'), ['class' => 'btn w-xs btn-success']) ?>
                    <?= $this->Form->end() ?>

                    <code>เพื่อให้รูปภาพออกมาสวยงาม <br/>ควรใช้รูปที่มีขนาดของแต่ละด้านเท่ากัน</code>
                </div>
            </div>
        </div>

        <div class="col-lg-12 no-padding">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    แก้ไขรหัสผ่าน
                </div>
                <div class="panel-body" style="display: block;">
                    <?=
                    $this->Form->create('authen', ['class' => '', 'novalidate' => true,
                        'url' => ['controller' => 'adminmaid', 'action' => 'changepassword', $maid->id, $maid->user->id]])
                    ?>
                    <div class="form-group">
                        <label class=""><?= __('Password') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->control('password', ['label' => false, 'class' => 'form-control input-sm']); ?>
                    </div>
                    <div class="form-group">
                        <label class=""><?= __('Confirm Passsword') ?> <span class="color-red">*</span></label>
                        <?= $this->Form->control('confirmpassword', ['label' => false, 'type' => 'password', 'class' => 'form-control input-sm']); ?>
                    </div>

                    <?= $this->Form->button(__('Change Password'), ['class' => 'btn w-xs btn-success']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>


    </div>
</div>