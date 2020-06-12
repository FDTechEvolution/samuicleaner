<h2>รายละเอียดการจองของลูกค้า</h2>
<p><strong>หมายเลขการจอง</strong> <?=h($bookingData->bookingno)?></p>
<p><strong>แพกเกจ</strong> <?=h($bookingData->package)?></p>
<h3><strong>ราคารวม</strong> <?=h($bookingData->price)?> บาท</h3>
<a href="<?=SITE_URL?>adminbooking/view/<?=$bookingData->id?>">รายละเอียด</a>