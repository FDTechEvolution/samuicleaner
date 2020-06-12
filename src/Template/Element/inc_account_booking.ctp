<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= __('Date') ?></th>
                    <th><?= __('Booking No.') ?></th>
                    <th><?=__('Cleaner')?></th>
                    <th><?=__('Total Amount')?></th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($user->bookings) && sizeof($user->bookings) != 0) { ?>
                    <?php foreach ($user->bookings as $value) : ?>
                    <?php  
                        $maid= $value->maid;
                        $maidName = $maid->user->firstname.'  '.$maid->user->lastname
                    ?>
                    <tr>
                        <td><?=h($value->created)?></td>
                        <td><?=h($value->bookingno)?></td>
                        <td><?=$this->Html->link($maidName,['controller'=>'maids','action'=>'view',$maid->id],['escape'=>false,'target'=>'_blank'])?></td>
                        <td><?=h($value->price)?></td>
                        <td><span class="label label-green"><?=$value->status=='CO'?__('Completed'):__('Waiting')?></span></td>
                    </tr>
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
