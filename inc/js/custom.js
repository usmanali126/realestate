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

    $('#cookie-message-button').on('click', function () {
        $(this).parents('#cookie-message').remove();
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            last_msg_funtion();
        }
    });
    
    
    function last_msg_funtion()
    {

        var ID = $(".post_box:last").attr("id");
        $('div#last_msg_loader').html('<img src="images/200_s.gif">');
        $.post("index.php?action=get&last_msg_id=" + ID,
                function (data) {
                    if (data != "") {
                        $(".post_box:last").after(data);
                        $("img").lazyload({
                            effect: "fadeIn"
                        });
                    }
                    $('div#last_msg_loader').empty();
                });
    }
    ;
});