<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=1692496891046330";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!--=== Footer v4 ===-->
<div class="footer-v4">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-4 md-margin-bottom-40">
                    <h3>Contact Us</h3>
                    <ul class="list-unstyled address-list margin-bottom-20">
                        <li><i class="fa fa-angle-right"></i>88/107 moo.5 T.Bophut Koh Samui, Surat Thani 84320</li>
                        <li><i class="fa fa-angle-right"></i>Phone: 077945073</li>
                        <li><i class="fa fa-angle-right"></i>Mobile: 0629753014</li>
                        <li><i class="fa fa-angle-right"></i>Line ID: samuicleaner</li>
                        <li><i class="fa fa-angle-right"></i>Email: samuicleaner@gmail.com</li>
                    </ul>

                </div>

                <div class="col-md-4">
                    <div class="fb-page" data-href="https://www.facebook.com/SamuiCleaner-106231310037378/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SamuiCleaner-106231310037378/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SamuiCleaner-106231310037378/">SamuiCleaner</a></blockquote></div>


                </div>
                <div class="col-md-4 color-light">
                    <div class="headline" style="margin: 0px !important;"><h4 class="color-light">Foreign Exchange Rate</h4></div>

                    <table class="table ">
                        <thead>
                            <tr>
                                <td><?=__('Currency')?></td>
                                <td class="text-right"><?=__('Exchange')?>(฿)</td>
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach ($convertionRates as $rate): ?>
                                <tr>
                                    <td style="padding: 4px !important;"><image src="<?=$rate['icon']?>" width="25px"/> <?=$rate['base']?></td>
                                    <td style="padding: 4px !important;" class="text-right"><?=number_format($rate['rate'], 2)?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>


                </div>


            </div><!--/end row-->
        </div><!--/end continer-->
    </div><!--/footer-->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        2018 &copy; Samui Cleaner. ALL Rights Reserved.
                        <a target="_blank" href="https://www.samuicleaner.com/">www.samuicleaner.com</a> Developed by <a href="https://www.fdtech.co.th" target="_blank">FDTech</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline sponsors-icons pull-right">
                        <li><i class="fa fa-cc-paypal"></i></li>
                        <li><i class="fa fa-cc-visa"></i></li>
                        <li><i class="fa fa-cc-mastercard"></i></li>
                        <li><i class="fa fa-cc-discover"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--/copyright-->
</div>
<!--=== End Footer v4 ===-->
