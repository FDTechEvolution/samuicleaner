<?= $this->Html->css('/assets/css/pages/page_clients.css') ?>
<style>
    ._icon{
        font-size: 16px !important;
        padding-top:4px !important;
        min-width:20px !important;
    }
</style>
<div class="flat-testimonials bg-image-v1 parallaxBg margin-bottom-60" style="background-position: 50% -30px;" id="top">
    <div class="container bg-color-light padding-sm">
        <?= $this->Form->create('booking', ['class' => 'sky-form', 'novalidate' => true, 'style' => 'border: none !important;', 'id' => 'frm']) ?>
        <div class="row">
            <div class="col-md-8">
                <div class="headline">
                    <h2><?= __('Booking your cleaner') ?></h2>
                </div>

                <section class="col col-6">
                    <label class="label"><?= __('Service') ?></label>
                    <label class="select">
                        <?= $this->Form->select('service', $services, []); ?>
                        <i></i>
                    </label>
                </section>
                <section class="col col-6">
                    <label class="label"><?= __('Area') ?></label>
                    <label class="select">
                        <?= $this->Form->select('area', $areas, []); ?>
                        <i></i>
                    </label>
                </section>
                <?php
                $_package = isset($booking['session']['package']) ? $booking['session']['package'] : '';
                ?>
                <section class="col col-3">
                    <label class="radio"><input name="package" checked="" type="radio" value="S" id="package_s" <?= $_package == 'S' ? 'checked' : '' ?>><i class="rounded-x"></i><?= __('Single booking') ?></label>
                </section>
                <section class="col col-3">
                    <label class="radio"><input name="package" type="radio" value="HR"  id="package_hr" <?= $_package == 'HR' ? 'checked' : '' ?>><i class="rounded-x"></i><?= __('Holiday Rental') ?></label>
                </section>
                <section class="col col-3">
                    <label class="radio"><input name="package" type="radio" value="M"  id="package_m" <?= $_package == 'M' ? 'checked' : '' ?>><i class="rounded-x"></i><?= __('Monthly booking') ?></label>
                </section>
                <?= $this->Form->hidden('_package', ['value' => $_package, 'id' => '_package']) ?>
                <?= $this->Form->unlockField('package'); ?>

                <div class="col-md-12 no-padding" id="div_single">
                    <section class="col col-4">
                        <label class="label"><?= __('Total Hour') ?></label>
                        <label class="select">
                            <?= $this->Form->select('hour', $hours, []); ?>
                            <i></i>
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="label"><?= __('Date') ?></label>
                        <label class="input">
                            <?php $date = isset($booking['date']) ? $booking['date'] : date("d-m-Y", strtotime(' +1 day')); ?>
                            <?= $this->Form->control('date', ['label' => false, 'id' => 'date', 'value' => $date,'readonly'=>'readonly']); ?>
                            <i class="icon-append fa fa-calendar"></i>
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="label"><?= __('Time') ?></label>
                        <label class="select">
                            <?= $this->Form->select('time', $times, []); ?>
                            <i></i>
                        </label>
                    </section>
                </div>
                <div class="col-md-12 no-padding" id="div_monthly" style="display: none;">
                    <section class="col col-4">
                        <label class="label"><?= __('Service per Week') ?></label>
                        <label class="select" id="dd_service_qty">
                            <?= $this->Form->select('service', [1 => '1 time', 2 => '2 times'], []); ?>
                            <i></i>
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="label"><?= __('Total Hour') ?></label>
                        <label class="select">
                            <?= $this->Form->select('hour_week', $hours, []); ?>
                            <i></i>
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="label"><?= __('Start Date') ?></label>
                        <label class="input">
                            <?= $this->Form->control('start_date', ['label' => false, 'id' => 'start_date','readonly'=>'readonly', 'value' => date("d-m-Y", strtotime(' +1 day'))]); ?>
                            <i class="icon-append fa fa-calendar"></i>
                        </label>
                    </section>
                    <section class="col-md-12">
                        <label class="label"><?= __('Service Days') ?></label>
                        <section class="col col-4">
                            <label class="checkbox"><input name="day[]" data-id="day" type="checkbox" value="sunday"><i></i><?= __('Sunday') ?></label>
                            <label class="checkbox"><input name="day[]" data-id="day" type="checkbox" value="wednesday"><i></i><?= __('Wednesday') ?></label>
                            <label class="checkbox"><input name="day[]" data-id="day" type="checkbox" value="saturday"><i></i><?= __('Saturday') ?></label>
                        </section>
                        <section class="col col-4">
                            <label class="checkbox"><input name="day[]" data-id="day" type="checkbox" value="monday"><i></i><?= __('Monday') ?></label>
                            <label class="checkbox"><input name="day[]" data-id="day" type="checkbox" value="thursday"><i></i><?= __('Thursday') ?></label>
                        </section>
                        <section class="col col-4">
                            <label class="checkbox"><input name="day[]" data-id="day" type="checkbox" value="tuesday"><i></i><?= __('Tuesday') ?></label>
                            <label class="checkbox"><input name="day[]" data-id="day" type="checkbox" value="friday"><i></i><?= __('Friday') ?></label>
                        </section>
                        <?= $this->Form->unlockField('day'); ?>
                    </section>
                </div>
                <div class="col-md-12 text-center" id="bt">
                    <section>
                        <?= $this->Form->button(__('Find Clener'), ['type' => 'button', 'class' => 'btn-u', 'id' => 'find_bt']) ?>
                        <?= $this->Html->link($this->Form->button(__('Clear'), ['class' => 'btn-u btn-u-default', 'type' => 'button']), ['controller' => 'bookings'], ['escape' => false])
                        ?>
                    </section>
                </div>
            </div>
            <div class="col-md-4">
                <iframe src="<?= SITE_URL ?>bookings/summaryview" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"></iframe>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div><!--/end container-->
</div>
<?= $this->Html->script('booking.js') ?>


<script>


    jQuery(document).ready(function () {
        $('#find_bt').on('click', function () {
            var package = $('input[name="package"]:checked').val();
            console.log(package);
            if (package === 'M') {
                var days = $('input[data-id="day"]:checked');
                console.log(days.length);
                if (days.length === 0) {
                    alert('Please select Service Day');
                    return false;
                }
            }
            $('#frm').submit();
        });

        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate()+1);

        $('#date').datepicker({
            minDate: today,
            dateFormat: 'dd-mm-yy'
        });
        $('#start_date').datepicker({
            minDate: today,
            dateFormat: 'dd-mm-yy'
        });

    });

</script>