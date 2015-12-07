/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
//$('#scroll_up').css('display','none');
    $(window).scroll(function () {

        if ($(this).scrollTop() > 700) {
            $('#scroll_up').fadeIn();
        } else {
            $('#scroll_up').fadeOut();

        }
    });

    $('#scroll_up').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $('.carousel').each(function () {
        $(this).carousel({
            interval: false
        });
    });

    $('.delete').on('click', function () {
        var value = $(this).val();
        var con = confirm("Are you sure want to delete Featured image");
        if (con == true) {
            $.ajax({
                url: './../classes/realestate.php',
                type: 'POST',
                data: {image_d: value},
                success: function (result) {
                    alert(result);
                    console.log(result);
                    $(this).parent().parent('.form-group').remove()
                    //window.location.replace("record.php");
//                }
                },
                error: function (jqxhr, textStatus, errorThrown)
                {
                    console.log(jqxhr);
                    console.log(textStatus);
                    console.log(errorThrown);

//                            for (key in jqxhr)
//                                alert(key + ":" + jqxhr[key])                                                                 
//                            for (key2 in textStatus)
//                                alert(key + ":" + textStatus[key])
//                            for (key3 in errorThrown)
//                                alert(key + ":" + errorThrown[key])

                    //<--- All those logs/alerts, don't say anything helpful, how can I understand what error is going on? ---->

                }
            });
        }

//        alert(value);
    });
    
    $('.remove').on('click', function () {
        var value = $(this).siblings('img').attr('alt');
        alert(value);
        var con = confirm("Are you sure want to delete this image");
        if (con == true) {
            $.ajax({
                url: './../classes/realestate.php',
                type: 'POST',
                data: {d_name: value},
                success: function (result) {
                    alert(result);
                    console.log(result);
                    //$(this).parent().parent('.form-group').remove();
                    //window.location.replace("record.php");
//                }
                }
            });
        }

//        alert(value);
    });

});