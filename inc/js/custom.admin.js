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

                }
            });
        }

//        alert(value);
    });

    $('.remove').on('click', function () {
        var value = $(this).siblings('img').attr('alt');
//        alert(value);
        var con = confirm("Are you sure want to delete this image");
        if (con == true) {
            $.ajax({
                url: './../classes/realestate.php',
                type: 'POST',
                data: {d_name: value},
                success: function (result) {
//                    alert(result);
                    console.log(result);
                    //$(this).parent().parent('.form-group').remove();
                    //window.location.replace("record.php");
//                }
                }
            });
        }

//        alert(value);
    });

    var url = $(location).attr('pathname');
    var last_val = url.split('/')[url.split('/').length - 1];
    if (last_val == 'posts.php') {
        $.urlParam = function (name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results == null) {
                return null;
            }
            else {
                return results[1] || 0;
            }
        }
    }
    if($.urlParam('page')==null){
        $("#1").addClass('active');
//        console.log("1");
    } else{
        
        $("#"+$.urlParam('page')).addClass('active');
//        console.log($.urlParam('page'));
    }
     

});