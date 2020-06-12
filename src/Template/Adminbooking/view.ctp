<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-success">Booking <small><?= h($booking->bookingno) ?></small></h4>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                           
                            <button class="btn btn-primary btn-sm"><i class="fa fa-dollar"></i> จ่ายเงิน</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row m-b-xl">
                    <div class="col-sm-6">
                        <h4 class="text-primary">ลูกค้า</h4>
                        <address>
                            <strong><?= h($booking->user->firstname . ' ' . $booking->user->lastname) ?></strong><br>
                            <?= h($booking->c_address->address1 . ' ' . $booking->c_address->address2) ?><br>
                            <?= h($booking->c_address->tambol . ' ' . $booking->c_address->amphur . ' ' . $booking->c_address->postal) ?><br>
                            <abbr title="Phone">โทร: </abbr> <a href="tel:<?= h($booking->user->phone) ?>"><?= h($booking->user->phone) ?></a>
                            <abbr title="Email">Email: </abbr> <?= h($booking->user->email) ?>
                            <abbr title="LineID">LineID: </abbr> <?= h($booking->user->lineid) ?>
                        </address>
                        <?php
                        $map = 'ไม่มี';
                        $mapUrl = '';
                        if(!is_null($booking->c_address->lat) && $booking->c_address->lat !='' && !is_null($booking->c_address->long) && $booking->c_address->lat!=''){
                            
                            $mapUrl = sprintf('https://maps.google.com/maps?daddr=%s,%s&amp;ll=',$booking->c_address->lat,$booking->c_address->long);
                            $map = $this->Html->link('View',$mapUrl,['target'=>'_blank','class'=>'text-info']);
                        }
                        ?>
                        <p><strong>Google Map: </strong><?=$map?></p>
                    </div>
                    <div class="col-sm-6 text-left">
                        <h4 class="text-primary">รายละเอียดการจอง</h4>
                        <p style="margin-bottom: 3px;"><strong>วันที่จอง: </strong><?= is_null($booking->date)?'':$booking->date->i18nFormat(DATE_FORMATE, null) ?></p>
                        <p style="margin-bottom: 3px;"><strong>เวลาจอง: </strong><?= is_null($booking->time)?'':$booking->time->i18nFormat(TIME, null) ?></p>
                        <p style="margin-bottom: 3px;"><strong>จำนวนชั่วโมง: </strong><?= $booking->hour ?></p>
                        <p style="margin-bottom: 3px;"><strong>แม่บ้าน: </strong><?= $booking->maid->user->fullname_th ?></p>
                    </div>
                </div>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Item List</th>
                            <th class="text-right">Quantity</th>

                            <th class="text-right">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div><strong><?= h($booking->service_type . ', ' . $booking->package) ?></strong></div>
                                <small>
                                    <?= h('จำนวน ' . $booking->hour . ' ชั่วโมง, ' . $booking->date . ' ' . $booking->time) ?>
                                </small>
                            </td>
                            <td class="text-right"><?= $this->Number->Format($booking->hour) ?></td>

                            <td class="text-right"><?= $this->Number->Format($booking->price) ?></td>
                        </tr>

                    </tbody>
                </table>

                <div class="row m-t">
                    <div class="col-md-4 col-md-offset-8">
                        <table class="table table-striped text-right">
                            <tbody>

                                <tr>
                                    <td><strong class="text-success">TOTAL :</strong></td>
                                    <td><strong class="text-success"><?= $this->Number->format($booking['payments'][0]['amount']) ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="m-t"><strong>Description</strong>
                            <?= $booking->description ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>