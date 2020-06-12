<div class="headline">
    <h2><?= __('Your booking summary') ?></h2>
</div>
<div class="service-or equal-height-column">
    <?php if (!isset($bookingData['package_name'])) { ?>



        <div class="inner-faq-b">
            <h3><i class="icon-control-rewind"></i> <?= __('Please select options for your booking') ?></h3>
        </div>


    <?php } else { ?>

        <?php if (isset($bookingData['maid']) && !is_null($bookingData['maid'])) { ?>
            <div class="inner-faq-b">
                <h4> <i class="icon-user-female"></i><?= h($bookingData['maid']['fullname_th']) ?></h4>
            </div>
        <?php } ?>

        <div class="inner-faq-b">
            <h4> <i class="icon-notebook"></i><?= h($bookingData['package_name']) ?></h4>
            <p><i class="icon-pointer _icon"></i> <?= h($bookingData['area']) ?></p>
            <?php if (isset($bookingData['hour']) && !is_null($bookingData['hour'])) { ?>
                <p><i class="icon-hourglass _icon"></i> <?= _('Total') ?> <strong><?= h($bookingData['hour']) ?></strong> <?= _('Hour') ?></p>
            <?php } ?>
            <?php if (isset($bookingData['date']) && !is_null($bookingData['date'])) { ?>
                <p><i class="icon-calendar _icon"></i> <?= h($bookingData['date']) ?></p>
            <?php } ?>
            <?php if (isset($bookingData['start_date']) && !is_null($bookingData['start_date'])) { ?>
                <p><i class="icon-calendar _icon"></i> <?= h(__('Start on ') . $bookingData['start_date']) ?></p>
            <?php } ?>
            <?php if (isset($bookingData['time']) && !is_null($bookingData['time'])) { ?>
                <p><i class="icon-clock _icon"></i> <?= h($bookingData['time']) ?></p>
            <?php } ?>
            <?php if (isset($bookingData['service_per_week']) && !is_null($bookingData['service_per_week'])) { ?>
                <p><i class="icon-clock _icon"></i> <?= h($bookingData['service_per_week'].' '.__('Time(s) per week')) ?></p>
            <?php } ?>
            <div class="" id="maidinfo">
            </div>
            <?= $this->Form->hidden('maid_id', ['id' => 'maid_id']) ?>
            <?= $this->Form->unlockField('maid_id'); ?>

        </div>
    <?php } ?>
</div>