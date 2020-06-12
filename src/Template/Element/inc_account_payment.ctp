
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= __('Date') ?></th>
                    <th><?= __('Booking No.') ?></th>
                    <th><?= __('Total Amount') ?></th>
                    <th>Status</th>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($user->bookings) && sizeof($user->bookings) != 0) { ?>
                    <?php foreach ($user->bookings as $value) : ?>
                        <?php if ($value->payments != null && sizeof($value->payments) != 0) { ?>
                            <?php $payment = $value['payments'][0]; ?>
                            <tr>
                                <td><?= h($payment->created) ?></td>
                                <td><?= h($value->bookingno) ?></td>

                                <td><?= h($payment->amount) ?></td>
                                <td>
                                    <?php if ($payment->status == 'CO') { ?>
                                        <span class="label label-green"><?= __('Completed') ?></span>
                                    <?php } else { ?>
                                        <span class="label label-warning"><?= __('Waiting payment') ?></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($payment->status == 'CO') { ?>
                                        <?= __('Paid') ?>
                                    <?php } else { ?>
                                        <?= $this->Html->link(__('Pay Now'), ['controller' => 'payments', 'action' => 'pay', $payment->id], []) ?>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php } ?>
                    <?php endforeach; ?>


                <?php } else { ?>
                    <tr>
                        <td class="text-center"><?= __('No Data') ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>