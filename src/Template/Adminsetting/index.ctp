<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <h3>Email</h3>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-heading">
                ตั้งค่า email
            </div>
            <div class="panel-body">
                <?=
                $this->Form->create($email, ['class' => 'form-horizontal', 'novalidate' => true,
                    'url' => ['controller' => 'adminsetting', 'action' => 'email']])
                ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-9 checkbox">
                        <label> 
                            <?= $this->Form->checkbox('email_isenable', ['value' => 'Y']); ?> Enable email
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Server</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('email_server', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Port</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('email_port', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('email_username', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('email_password', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">From Email</label>
                    <div class="col-sm-9">
                        <?= $this->Form->control('email_address', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2 text-center">
                        <button type="submit" class="btn w-xs btn-success">Save changes</button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-heading">

                ส่งอีเมล
            </div>
            <div class="panel-body">
                <?=
                $this->Form->create($email, ['class' => '', 'novalidate' => true,
                    'url' => ['controller' => 'adminsetting', 'action' => 'testsendemail']])
                ?>

                <div class="form-group">
                    <label>To</label> 
                    <?= $this->Form->control('to', ['label' => false, 'class' => 'form-control', 'aria-required' => 'true', 'required' => 'required']); ?>
                </div>
                <div class="form-group">
                    <label class="">ข้อความ</label>
                    <?= $this->Form->textarea('message', ['label' => false, 'required' => 'required', 'class' => 'form-control input-sm']); ?>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2 text-center">
                        <button type="submit" class="btn w-xs btn-success">Send</button>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>