<h2>รายละเอียดการจองของคุณ / Booking Detail.</h2>
<p><strong>หมายเลขการจอง / Booking no. : </strong> <?=h($bookingData->bookingno)?></p>
<p><strong>แพกเกจ / Package : </strong> <?=h($bookingData->package)?></p>
<p><strong>วัน / Date : </strong> <?=h($bookingData->date)?></p>
<p><strong>เวลา / Time : </strong> <?=h($bookingData->time)?></p>
<p><strong>จำนวน / Total : </strong> <?=h($bookingData->hour)?> ชั่วโมง (Hour)</p>
<h3><strong>ราคารวม / Amount : </strong> <?=h($bookingData->price)?> บาท (ฺBaht)</h3>