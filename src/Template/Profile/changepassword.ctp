<div class="profile-body margin-bottom-20">
            <div class="tab-v1">
                <ul class="nav nav-justified nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#passwordTab">Change Password</a></li>
                </ul>
                <div class="tab-content">
                    <div id="passwordTab" class="profile-edit active">
                        <form class="sky-form" id="sky-form4" action="#">
                            <dl class="dl-horizontal">
                                <dt>Email address</dt>
                                <dd>
                                    <section>
                                        <label class="input">
                                            <i class="icon-append fa fa-envelope"></i>
                                            <input type="email" placeholder="Email address" name="email">
                                            <?= $this->Form->control('email', ['placeholder' => 'Email address', 'label' => false]); ?>
                                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                        </label>
                                    </section>
                                </dd>
                                <dt>Enter your password</dt>
                                <dd>
                                    <section>
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <input type="password" id="password" name="password" placeholder="Password">
                                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                        </label>
                                    </section>
                                </dd>
                                <dt>Confirm Password</dt>
                                <dd>
                                    <section>
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                        </label>
                                    </section>
                                </dd>
                            </dl>
                           
                            <button type="button" class="btn-u btn-u-default">Cancel</button>
                            <button class="btn-u" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>