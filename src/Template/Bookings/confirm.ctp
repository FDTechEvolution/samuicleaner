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
        <?= $this->Form->create('account', ['class' => 'form-horizontal', 'id' => 'frm', 'novalidate' => true, 'style' => 'border: none !important;']) ?>
        <div class="row">
            <div class="col-md-12 text-center" style="border-bottom: 1px dotted #e4e9f0;padding-bottom: 10px;">
                <?= $this->Html->link('<button class="btn-u btn-u-blue" type="button"><i class="glyphicon glyphicon-chevron-left"></i>' . __('Back') . '</button>', ['action' => 'address'], ['escape' => false]) ?>
                <?= $this->Html->link('<button class="btn-u">' . __('Confirm') . ' <i class="glyphicon glyphicon-chevron-right"></i></button>', [], ['escape' => false]) ?>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6 text-left color-dark">
                <div class="headline">
                    <h2><?= __('Your Information') ?></h2>
                </div>
                <strong><?= h($user['firstname'] . ' ' . $user['lastname']) ?></strong>
                <p><?= h($user['c_addresses'][0]['address1'] . ', ' . $user['c_addresses'][0]['c_province']['name']) ?></p>
                <p><?= __('Phone') . ': ' . $user['phone'] ?></p>
                <p><?= __('Email') . ': ' . $user['email'] ?></p>
                <div id="map" class="map margin-bottom-10" style="height: 325px;"></div>
            </div>

            <div class="col-md-6 text-left">
                
                <iframe src="<?= SITE_URL ?>bookings/summaryview" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"></iframe>

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
    var defaultLat = <?= $user['c_addresses'][0]['lat'] ?>;
    var defaultLong = <?= $user['c_addresses'][0]['long'] ?>;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: defaultLat, lng: defaultLong}
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: defaultLat, lng: defaultLong}
        });

    }

   
</script>