<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <?= $this->Html->link('ดูทั้งหมด', ['controller' => 'adminbooking'], []) ?>
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <h4>จองล่าสุด </h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table cellspacing="1" cellpadding="1" class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th style="width: 150px;" class="text-center">วันที่จอง</th>
                                <th>เวลาจอง</th>
                                <th style="width: 100px;" class="text-center">Booking No.</th>
                                <th>ลูกค้า</th>
                                
                                <th>สถานะการจ่ายเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $value) : ?>
                                <tr>
                                    <td class="text-center"><?= is_null($value->date)?'':($value->date->i18nFormat(DATE_FORMATE, null)) ?></td>
                                    <td><?=is_null($value->time)?'':$value->time->i18nFormat(TIME, null)?></td>
                                    <td class="text-center"><?= h($value->bookingno) ?></td>
                                    <td><?= h($value->user->firstname . ' ' . $value->user->lastname) ?></td>
                                    
                                    <?php
                                    $paymentStatus = $value['payments'][0]['status'];
                                    ?>
                                    <td><?= $paymentStatus == 'WT' ? '<span class="text-danger">ยังไม่ได้จ่าย</span>' : '<span class="text-success">จ่ายแล้ว</span>' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <?= $this->Html->link('ดูทั้งหมด', ['controller' => 'adminbooking'], []) ?>
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <h4>ชำระเงินล่าสุด</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table cellspacing="1" cellpadding="1" class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th style="width: 150px;">วันที่</th>
                                <th class="text-center">Booking No.</th>

                                <th style="width: 150px;" class="text-center">จำนวนเงิน</th>
                                <th class="text-left">Paypal Transaction</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payments as $value) : ?>
                                <tr>
                                    <td><?= h($value->paymentdate->i18nFormat(DATE_FORMATE, null)) ?></td>
                                    <td class="text-center"><?= h($value->booking->bookingno) ?></td>

                                    <td class="text-center"><?= h($value->amount) ?></td>
                                    <td class="text-left">
                                        <a href="https://www.paypal.com/activity/payment/<?= $value->paypalid ?>" style="text-decoration:underline;color: #0044cc;" target="_blank">View</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
