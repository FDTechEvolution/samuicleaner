<script>
    function sendsubmit(maid_id) {
        $("#maid_id").val(maid_id);
        $("#command").val('save');
        $("#Booking").submit();
    }

    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    function setText() {
        var hour = $("select[name='hour']").val() / 100;
        var package = $("select[name='package']").val();
        var rate = <?= $appsetting->price_per_hour ?>;
        var discount_percen = <?= DISCOUNT_PERCEN ?>;
        var total_month = 1;
        var amount = 0;
        var isOpenExtra = false;
        var isDiscount = false;
        var discount = 0;
        var weekAmount = 1;

        //cal amount
        if (package === 'M1W') {
            $("#main_package_box").attr("style", "display:block");
            $("#service_per_month_value").text(4);
            isDiscount = true;
            weekAmount = 4;
            amount = (hour * rate);
            total_month = <?= TOTAL_MONTH ?>;
        } else if (package === 'M2W') {
            $("#main_package_box").attr("style", "display:block");
            $("#service_per_month_value").text(8);
            weekAmount = 8;
            isDiscount = true;
            amount = (hour * rate);
            total_month = <?= TOTAL_MONTH ?>;
        } else {
            $("#main_package_box").attr("style", "display:none");
            //$("#discount_box").attr("style", "display:none");
            discount_percen = 0;
            isDiscount = false;
            amount = hour * rate;
        }

        $("#main_extra_box_text").empty();
        var extra_text = "";
        $('input[type=checkbox]').each(function () {
            if (this.checked) {
                isOpenExtra = true;
                var text = $(this).attr("att-text");
                var seq = $(this).attr("seq");
                var e_hour = $("select[name='hour_" + seq + "']").val() / 100;
                var html_left = "<div class='col-md-8'>" + "+Extra" + text + "</div>";
                var total = e_hour * rate;
                var html_right = "<div class='col-md-4 text-right'>" + addCommas(total) + "฿</div>";
                extra_text = extra_text + html_left + html_right;
                amount = amount + total;
                //console.log(e_hour + " - " + text);
            }
        });

        amount = (amount * (weekAmount * total_month));


        if (isDiscount) {
            //$("#discount_box").attr("style", "display:block");
            discount = (discount_percen / 100) * amount;
        }

        if (isOpenExtra) {
            $("#main_extra_box").attr("style", "display:block");
        } else {
            $("#main_extra_box").attr("style", "display:none");
        }

        $("#main_extra_box_text").append(extra_text);

        //set text
        $("#t_total_hour").text(hour);
        $("#t_discount").text(discount_percen + "%");

        $("#t_subtotal").text(addCommas(amount) + '฿');
        $("#t_total_amount").text(addCommas(amount - discount) + '฿');
    }


    $(document).ready(function () {
        $("select").change(function () {
            setText();
            //setText('extra');
        });

        $("input[type='checkbox']").click(function () {
            setText();
        });
    });
</script>
<div class="breadcrumbs-v4">
    <div class="container">
        <h1><?= __('Booking your cleaner') ?></h1>

    </div><!--/end container-->
</div>
<div class="content-md margin-bottom-30">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="tag-box tag-box-v3 margin-bottom-40 bg-color-green">
                    <h2 class="color-light">1.<?= __('Cleaning Detail') ?></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="tag-box tag-box-v2 margin-bottom-40">
                    <h2><?= __('MyInformation') ?></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="tag-box tag-box-v2 margin-bottom-40">
                    <h2><?= __('Payment') ?></h2>

                </div>
            </div>

        </div>
        <hr>
        <?= $this->Form->create('Booking', ['class' => 'sky-form', 'novalidate' => true, 'name' => 'frm', 'id' => 'Booking', 'style' => 'border: none !important;']) ?>
        <div class="row">

            <div class="col-md-8" >
                <?= $this->Form->hidden('command', ['id' => 'command', 'value' => 'find']) ?>
                <?= $this->Form->unlockField('command') ?>

                <fieldset style="border-right: 1px solid #eee;">
                    <div class="row">
                        <section class="col col-4">
                            <label class="label"><?= __('Area') ?></label>
                            <label class="select">
                                <?= $this->Form->select('area', $areas, []); ?>
                                <i></i>
                            </label>
                        </section>
                        <section class="col col-4">
                            <label class="label"><?= __('Service') ?></label>
                            <label class="select">
                                <?= $this->Form->select('service', $services, []); ?>
                                <i></i>
                            </label>
                        </section>
                        <section class="col col-4">
                            <label class="label"><?= __('Date') ?></label>
                            <label class="input">

                                <?= $this->Form->control('date', ['label' => false, 'id' => 'date', 'value' => date("d-m-Y")]); ?>
                                <i class="icon-append fa fa-calendar"></i>
                            </label>
                        </section>



                    </div>

                    <div class="row">
                        <section class="col col-4">
                            <label class="label"><?= __('Time') ?></label>
                            <label class="select">
                                <?= $this->Form->select('time', $times, []); ?>
                                <i></i>
                            </label>
                        </section>
                        <section class="col col-4">
                            <label class="label"><?= __('Total Room') ?></label>
                            <label class="select">
                                <?= $this->Form->select('room', $rooms, []); ?>
                                <i></i>
                            </label>
                        </section>
                        <section class="col col-4">
                            <label class="label"><?= __('Total Hour') ?></label>
                            <label class="select">
                                <?= $this->Form->select('hour', $hours, []); ?>
                                <i></i>
                            </label>
                        </section>

                    </div>
                    <div class="row">
                        <section class="col col-8">
                            <label class="label"><?= __('Package') ?></label>
                            <label class="select">
                                <?= $this->Form->select('package', $packages, []); ?>
                                <i></i>
                            </label>
                            <p><?= __('***Monthly package,Charge for three months for one booking.') ?></p>
                        </section>
                    </div>
                    <div class="row">
                        <div id="accordion-1" class="panel-group acc-v1">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapse-Two" data-parent="#accordion-1" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                            <?= __('Extras Service') . ' [' . RATE_PER_HOUR . ' ' . __('Per Hour') . ']' ?>
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapse-Two" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <?php $count = 1; ?>
                                            <?php foreach ($addons as $a): ?>
                                                <?php
                                                $name = '';
                                                $lang = $this->request->session()->read('Config.language');

                                                if ((strpos($lang, "en") === 0) && $a['name_eng'] != null && $a['name_eng'] != '') {
                                                    $name = $a['name_eng'];
                                                } else {
                                                    $name = $a['name_th'];
                                                }
                                                ?>
                                                <div class="col-md-8">
                                                    <label class="checkbox">
                                                        <?= $this->Form->checkbox('extra_service_' . $count, ['value' => $a->id, 'att-text' => $name, 'seq' => $count]); ?><i></i><?= __($name) ?>
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <section>
                                                        <label class="select">
                                                            <?= $this->Form->select('hour_' . $count, $hours, []); ?>
                                                            <i></i>
                                                        </label>
                                                    </section>
                                                </div>
                                                <?php $count++; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <section>
                            <?= $this->Form->button(__('Find Cleaner'), ['class' => 'btn-u']) ?>
                        </section>
                    </div>
                </fieldset>

            </div>

            <div class="col-md-4" style="font-size: 15px !important">
                <div class="headline"><h2><?= __('Booking Detail') ?></h2></div>
                <div class="col-md-8"><?= __('Rate Per Hour') ?></div>
                <div class="col-md-4 text-right"><?= $appsetting->price_per_hour ?>฿</div>
                <div class="col-md-8"><?= __('Total Hour') ?></div>
                <div class="col-md-4 text-right" id="t_total_hour">1</div>
                <saction id="main_package_box" style="display: none;">
                    <div class="col-md-8"><?= __('Service Per Month') ?></div>
                    <div class="col-md-4 text-right" id="service_per_month_value"></div>
                    <div class="col-md-8"><?= __('Month Duration') ?></div>
                    <div class="col-md-4 text-right" id=""><?= TOTAL_MONTH ?></div>
                </saction>
                <saction id="main_extra_box" style="display: none;">
                    <saction id="main_extra_box_text">

                    </saction>
                </saction>
                <saction style="display: block;">

                    <div class="col-md-7" style="font-size: 18px;"><?= __('Total') ?></div>
                    <div class="col-md-5 text-right" id="t_subtotal" style="font-size: 18px;">0฿</div>
                    <div class="col-md-8"><?= __('Discount') ?></div>
                    <div class="col-md-4 text-right" id="t_discount">0%</div>
                    <div class="col-md-7 total-style"><?= __('Total Amount') ?></div>
                    <div class="col-md-5 text-right total-style" id="t_total_amount"><?= ($appsetting->price_per_hour * 1) ?>฿</div>

                </saction>
            </div>
        </div>



        <?= $this->Form->end() ?>
    </div>
</div>