<div class="container p-y-md">
    <div class="row">
        <div class="col-md-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <h4>การจองทั้งหมด</h4>

                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 150px;" class="text-left">วันที่จอง</th>
                                    <th>เวลาจอง</th>
                                    <th style="width: 100px;" class="text-center">Booking No.</th>
                                    <th>ลูกค้า</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bookings as $value) : ?>
                                    <tr class="hand-cursor" onclick="goToView('<?= $value->id ?>')">
                                        <td class="text-left"><?= is_null($value->date) ? '' : ($value->date->i18nFormat(DATE_FORMATE, null)) ?></td>
                                        <td><?= is_null($value->time)?'':$value->time->i18nFormat(TIME, null) ?></td>
                                        <td class="text-center"><?= h($value->bookingno) ?></td>
                                        <td><?= h($value->user->firstname . ' ' . $value->user->lastname) ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- .card-block -->
            </div>
        </div>
    </div>
</div>
<script>
    function goToView(id) {
        window.location.href = SITE_URL + 'adminbooking/view/' + id;
    }
</script>
