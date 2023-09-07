<h2>รายละเอียดการจองของลูกค้า</h2>
<p><strong>หมายเลขการจอง</strong> <?=h($bookingData->bookingno)?></p>
<p><strong>แพกเกจ</strong> <?=h($bookingData->package)?></p>
<p><strong>วัน</strong> <?=h($bookingData->date)?></p>
<p><strong>เวลา</strong> <?=h($bookingData->time)?></p>
<p><strong>จำนวน</strong> <?=h($bookingData->hour)?> ชั่วโมง</p>
<h3><strong>ราคารวม</strong> <?=h($bookingData->price)?> บาท</h3>
<a href="<?=SITE_URL?>adminbooking/view/<?=$bookingData->id?>">รายละเอียด</a>