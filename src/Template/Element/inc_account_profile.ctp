<?php //$user = $this->request->session()->read('Auth.User');  ?>
<div class="row">
    <div class="col-md-12 margin-bottom-20 tool-box">
        <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i> ' . __('Edit'), ['controller' => 'profile', 'action' => 'edit', $user->id], ['escape' => false]) ?>
        <?= $this->Html->link('<i class="glyphicon glyphicon-camera"></i> ' . __('Change Profile Image'), ['controller' => 'profile', 'action' => 'changeimage', $user->id], ['escape' => false]) ?>
    </div>
    <div class="col-md-3">
        <div class="responsive">
            <?php
            $profile = "user/user.jpg";
            if ((!(is_null($user->image)) && $user->image != '')) {
                $profile = '/uploads/images/' . $user->image->name;
            } elseif ((!(is_null($user->profile_image))) && $user->profile_image != '') {
                $profile = $user->profile_image;
            }
            ?>
            <?= $this->Html->image($profile, ['class' => 'img-responsive profile-img margin-bottom-20']) ?> 
        </div>
    </div>
    <div class="col-md-9">

        <h2 class="heading-md"><?= h($user->firstname . '  ' . $user->lastname) ?>  <?=$isMaid?__('[Cleaner]'):''?></h2>
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-unstyled specifies-list">
                    <li><i class="fa fa-caret-right"></i><?= __('Email') ?>: <?= h($user->email) ?></li>
                    <li><i class="fa fa-caret-right"></i><?= __('Phone Number') ?>: <?= h($user->phone) ?></li>
                </ul>

            </div>

        </div>
    </div>

</div>