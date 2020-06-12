<div class="breadcrumbs-v4">
    <div class="container">
        <h1>Become a cleaner</h1>

    </div><!--/end container-->
</div>


<div class="log-reg-v3 content-md padding-top-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($user, ['class' => 'sky-form', 'novalidate' => true, 'id' => 'maid_register']) ?>
                <fieldset>
                    <h4><?= __('Personal Infomation') ?></h4>
                    <div class="row">
                        <section class="col col-3">
                            <label class="label"><?= __('Full Name Thai') ?> <span class="color-red">*</span></label>
                            <label class="input">
                                <?= $this->Form->control('fullname_th', ['label' => false, 'id' => 'fullname_th']); ?>
                            </label>
                        </section>
                        <section class="col col-3">
                            <label class="label"><?= __('Full Name Eng') ?> <span class="color-red">*</span></label>
                            <label class="input">
                                <?= $this->Form->control('fullname_en', ['label' => false, 'id' => 'fullname_en']); ?>
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
                                <?= $this->Form->control('email', ['label' => false, 'id' => 'email']); ?>
                            </label>
                        </section>

                    </div>

                    <div class="row">
                        <section class="col col-3">
                            <label class="label"><?= __('Line ID') ?> <span class="color-red">*</span></label>
                            <label class="input">
                                <?= $this->Form->control('lineid', ['label' => false, 'required' => 'required']); ?>
                            </label>
                        </section>
                        <section class="col col-3">
                            <label class="label"><?= __('Card No') ?> <span class="color-red">*</span></label>
                            <label class="input">
                                <?= $this->Form->control('card_no', ['label' => false, 'required' => 'required']); ?>
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="label"><?= __('Birth Day') ?> <span class="color-red">*</span></label>
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

                    <div class="row">

                        <section class="col col-3">
                            <label class="label"><?= __('Password') ?> <span class="color-red">*</span></label>
                            <label class="input">
                                <?= $this->Form->control('password', ['label' => false]); ?>
                            </label>
                        </section>
                        <section class="col col-3">
                            <label class="label"><?= __('Confirm Password') ?> <span class="color-red">*</span></label>
                            <label class="input">
                                <?= $this->Form->control('confirmpassword', ['label' => false, 'required' => 'required', 'type' => 'password']); ?>
                            </label>
                        </section>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <h4><?= __('Job/Skill Detail') ?></h4>
                            <section style="margin-bottom: 5px !important;">
                                <div class="rating">
                                    <?php for ($i = 5; $i >= 1; $i--) { ?>
                                        <input type="radio" id="<?= h('thai-rating-' . $i) ?>"  name="Maids[thai_level]" value="<?= $i ?>">
                                        <label for="<?= h('thai-rating-' . $i) ?>"><i class="fa fa-star"></i></label>
                                    <?php } ?>

                                    Thai Level
                                </div>
                                <?= $this->Form->unlockField('Maids.thai_level') ?>
                            </section>
                            <section>
                                <div class="rating">
                                    <?php for ($i = 5; $i >= 1; $i--) { ?>
                                        <input type="radio" id="<?= h('eng-rating-' . $i) ?>" name="Maids[eng_level]" value="<?= $i ?>">
                                        <label for="<?= h('eng-rating-' . $i) ?>"><i class="fa fa-star"></i></label>
                                    <?php } ?>

                                    Eng Level
                                </div>
                                <?= $this->Form->unlockField('Maids.eng_level') ?>
                            </section>
                            <section>
                                <label class="label"><?= __('Workday') ?></label>
                                <div class="row">
                                    <?php foreach ($days as $d): ?>
                                        <div class="col-md-3">
                                            <label class="checkbox">
                                                <?= $this->Form->checkbox('Maids.work_day_' . $d, ['value' => $d, 'checked' => true]); ?><i></i><?= __($d) ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </section>
                            <section>
                                <label class="label"><?= __('Current Job') ?> <span class="color-red">*</span></label>
                                <label class="input">
                                    <?= $this->Form->control('Maids.job', ['label' => false, 'required' => 'required']); ?>
                                </label>
                            </section>
                        </div>
                        <div class="col-md-6">
                            <section>
                                <label class="label"><?= __('Introduce') ?> <span class="color-red">*</span></label>
                                <label class="textarea">
                                    <?= $this->Form->textarea('Maids.introduce', ['label' => false, 'required' => 'required']); ?>
                                </label>
                            </section>
                            <section>
                                <label class="label"><?= __('Experience') ?> <span class="color-red">*</span></label>
                                <label class="textarea">
                                    <?= $this->Form->textarea('Maids.experience', ['label' => false, 'required' => 'required']); ?>
                                </label>
                            </section>
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
                <footer class="text-center">
                    <button type="button" class="btn-u" id="submit_bt"><?= __('Submit') ?></button>

                </footer>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<script>
    var Validation = function () {
        return {
            //Validation
            initValidation: function () {
                $("#maid_register").validate({
                    rules:
                            {
                                fullname_en:
                                        {
                                            required: true
                                        },
                                fullname_th:
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
        $('#submit_bt').on('click', function () {
            //console.log('clicked');
            var email = $('#email').val();
            if (email !== '') {
                $.post(SITE_URL + "maids/checkemaildup/", {email: $('#email').val()}, function (res) {
                    if (res === 'ok') {
                        $('#maid_register').submit();
                    }else{
                        alert('email is already to use.');
                    }
                });
            }else{
                $('#maid_register').submit();
            }


        });

        Validation.initValidation();
    });

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?= GOOGLE_MAP_API_KEY ?>&callback=initMap">
</script>
<script>
    var marker;
    var position;
    var defaultLat = <?= $lat ?>;
    var defaultLong = <?= $long ?>;

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