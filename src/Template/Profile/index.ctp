<div class="content container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?= $this->Flash->render() ?>
            <div class="tab-v6">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#profile" role="tab" data-toggle="tab" aria-expanded="true"><?= __('Profile') ?></a></li>
                    <li class=""><a href="#booking" role="tab" data-toggle="tab" aria-expanded="false"><?= __('My Booking') ?></a></li>
                    <li class=""><a href="#payment" role="tab" data-toggle="tab" aria-expanded="false"><?= __('My Payment') ?></a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="profile">
                        <?= $this->element('inc_account_profile'); ?>
                    </div>

                    <div class="tab-pane fade" id="booking">
                        <?= $this->element('inc_account_booking'); ?>
                    </div>
                    <div class="tab-pane fade" id="payment">
                        <?= $this->element('inc_account_payment'); ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>

</div>