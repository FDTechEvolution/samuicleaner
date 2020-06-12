/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('input[type=radio][name=package]').on('change', function () {
        $.fn.openhid(this.value);

    });

    $("#dd_service_qty").on('change', function () {
        //alert("Works");
    });
    
    $("#create_account").on('click', function () {
        $('#regis_box').show();
        $('#login_box').hide();
    });


    $(window).load(function () {
        var _package = $('#_package').val();
        $.fn.openhid(_package);
    });

    //Maid select
    $('button[type=button][name=maid_select]').on('click', function () {
        var id = $(this).attr('value');
        $("#maid_id").val(id);
        $.fn.maidsumary(id);
        var etop = $('#div_body').offset().top;
        $('html, body').animate({
            scrollTop: etop
        }, 1000);
        //select_maid_frm
        $("#select_maid_frm").submit();


    });


    /****************
     * 
     * Function
     * 
     */
    $.fn.openhid = function (value) {
        if (value === 'M') {

            $("#div_monthly").show();
            $("#div_single").hide();
        } else if (value === 'S') {
            $("#div_monthly").hide();
            $("#div_single").show();
        } else if (value === 'HR') {
            $("#div_single").hide();
            $("#div_monthly").hide();
        }
    };
    $.fn.maidsumary = function (id) {
        var img = '';
        var name = $("#name_" + id).text();
        ;

        $("#maidinfo").empty();
        $("#maidinfo").append('<i class="icon-user-female _icon"></i><p>' + name + '</p>');
    };


});


function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}