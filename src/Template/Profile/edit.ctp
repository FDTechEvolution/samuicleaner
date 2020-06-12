<div class="content container">
    <div class="row">
        <div class="col-md-12">
            <?= $this->Flash->render() ?>
            <?php //debug($user);?>
            <div class="headline"><h2><?= __('Edit Profile') ?></h2></div>
            <?= $this->Form->create($user, ['novalidate' => true, 'class' => 'sky-form', 'name' => 'frm', 'enctype' => 'multipart/form-data', 'style' => 'border: none !important;']) ?>
            <div class="row">
                <section class="col col-3">
                    <label class="label"><?= __('First Name') ?> <span class="color-red">*</span></label>
                    <label class="input">
                        <?= $this->Form->control('firstname', ['label' => false]); ?>
                    </label>
                </section>
                <section class="col col-3">
                    <label class="label"><?= __('Last Name') ?> <span class="color-red">*</span></label>
                    <label class="input">
                        <?= $this->Form->control('lastname', ['label' => false]); ?>
                    </label>
                </section>
                <section class="col col-3">
                    <label class="label"><?= __('Phone') ?> <span class="color-red">*</span></label>
                    <label class="input">
                        <?= $this->Form->control('phone', ['label' => false, 'required' => 'required']); ?>
                    </label>
                </section>
                <section class="col col-3">
                    <label class="label"><?= __('Email') ?> <span class="color-red">*</span></label>
                    <label class="input">
                        <?= $this->Form->control('email', ['label' => false]); ?>
                    </label>
                </section>

            </div>

            <div class="row">
                <section class="col col-3">
                    <label class="label"><?= __('Line ID') ?> </label>
                    <label class="input">
                        <?= $this->Form->control('lineid', ['label' => false]); ?>
                    </label>
                </section>
                <section class="col col-3">
                    <label class="label"><?= __('Card No') ?> </label>
                    <label class="input">
                        <?= $this->Form->control('card_no', ['label' => false]); ?>
                    </label>
                </section>
                <section class="col col-6">
                    <label class="label"><?= __('Birth Day') ?></label>
                    <section class="col col-3">
                        <label class="select">
                            <?= $this->Form->select('birthday_day', $dayNo, []); ?>
                            <i></i>
                        </label>
                    </section>
                    <section class="col col-5">
                        <label class="select">
                            <?= $this->Form->select('birthday_month', $monthEN, []); ?>
                            <i></i>
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="select">
                            <?= $this->Form->select('birthday_year', $years, []); ?>
                            <i></i>
                        </label>
                    </section>
                </section>

            </div>
            <?php if ($isMaid) { ?>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <h4><?= __('Job/Skill Detail') ?></h4>
                            <section style="margin-bottom: 5px !important;">
                                <div class="rating">
                                    <?php for ($i = 5; $i >= 1; $i--) { ?>
                                        <input type="radio" id="<?= h('thai-rating-' . $i) ?>"  name="maids[0][thai_level]" value="<?= $i ?>">
                                        <label for="<?= h('thai-rating-' . $i) ?>"><i class="fa fa-star"></i></label>
                                    <?php } ?>

                                    Thai Level
                                </div>
                                <?= $this->Form->unlockField('Maids.0.thai_level') ?>
                            </section>
                            <section>
                                <div class="rating">
                                    <?php for ($i = 5; $i >= 1; $i--) { ?>
                                        <input type="radio" id="<?= h('eng-rating-' . $i) ?>" name="maids[0][eng_level]" value="<?= $i ?>">
                                        <label for="<?= h('eng-rating-' . $i) ?>"><i class="fa fa-star"></i></label>
                                    <?php } ?>

                                    Eng Level
                                </div>
                                <?= $this->Form->unlockField('Maids.0.eng_level') ?>
                            </section>
                            <section>
                                <label class="label"><?= __('Workday') ?></label>
                                <div class="row">
                                    <?php foreach ($days as $d): ?>
                                        <div class="col-md-3">
                                            <label class="checkbox">
                                                <?= $this->Form->checkbox('maids.work_day_' . $d, ['value' => $d, 'checked' => true]); ?><i></i><?= __($d) ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </section>
                            <section>
                                <label class="label"><?= __('Current Job') ?> <span class="color-red">*</span></label>
                                <label class="input">
                                    <?= $this->Form->control('maids.0.job', ['label' => false, 'required' => 'required']); ?>
                                </label>
                            </section>
                        </div>
                        <div class="col-md-6">
                            <section>
                                <label class="label"><?= __('Introduce') ?> <span class="color-red">*</span></label>
                                <label class="textarea">
                                    <?= $this->Form->textarea('maids.0.introduce', ['label' => false, 'required' => 'required']); ?>
                                </label>
                            </section>
                            <section>
                                <label class="label"><?= __('Experience') ?> <span class="color-red">*</span></label>
                                <label class="textarea">
                                    <?= $this->Form->textarea('maids.0.experience', ['label' => false, 'required' => 'required']); ?>
                                </label>
                            </section>
                            <?= $this->Form->hidden('maids.0.id', ['label' => false]); ?>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?= __('Your Address Location') ?></h4>
                            <p><?= __('Please mark you location on map') ?></p>
                            <div id="map" class="map margin-bottom-10"></div>
                            <?= $this->Form->hidden('Maids.position', ['label' => false, 'id' => 'position']); ?>

                        </div>

                    </div>

                </fieldset>

                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=<?= GOOGLE_MAP_API_KEY ?>&callback=initMap">
                </script>
                <script>
                    var marker;
                    var position;
                    var defaultLat = <?= $user['c_addresses'][0]['lat'] ?>;
                    var defaultLong = <?= $user['c_addresses'][0]['long'] ?>;
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 10,
                            center: {lat: defaultLat, lng: defaultLong}
                        });

                        marker = new google.maps.Marker({
                            map: map,
                            draggable: true,
                            animation: google.maps.Animation.DROP,
                            position: {lat: defaultLat, lng: defaultLong}
                        });
                        //console.log(map);
                        //marker.addListener('click', toggleBounce);
                        map.addListener('mouseout', function () {
                            console.log(marker.getPosition());
                            //alert(marker.getPosition());
                            position = marker.getPosition();
                            document.getElementById('position').value = position;
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

            <?php } ?>
            <div class="headline"><h5><?= __('Change Password') ?></h5></div>
            <div class="row">
                <section class="col col-4">
                    <label class="label"><?= __('Password') ?></label>
                    <label class="input">
                        <?= $this->Form->control('xpassword', ['label' => false, 'value' => '']); ?>
                    </label>
                </section>
                <section class="col col-4">
                    <label class="label"><?= __('Confirm Password') ?></label>
                    <label class="input">
                        <?= $this->Form->control('xconfirmpassword', ['label' => false, 'value' => '', 'type' => 'password']); ?>
                    </label>
                </section>
            </div>



            <hr>
            <?= $this->Html->link($this->Form->button(__('Back'), ['class' => 'btn-u btn-u-dark', 'type' => 'button']), ['controller' => 'profile'], ['escape' => false]) ?>
            <?= $this->Form->button(__('Save'), ['class' => 'btn-u']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

