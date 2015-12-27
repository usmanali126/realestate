/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    var last_id='';
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

    $('.btn-danger').on('click',function(){
        var value=$('.search-query').val();
        $('#search').html(value).hide();
        $(window).attr('location','index.php?search='+value);
//        alert(value);
    });


    $('#cookie-message-button').on('click', function () {
       Cookies.set('front_msg', 'privacy');
        $(this).parents('#cookie-message').remove();
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
			
			//var arr = split($(location).attr('pathname'));
			//var last_val = arr[arr.length-1];
			var url = $(location).attr('pathname');
			var last_val= url.split('/')[url.split('/').length - 1];
			
			if(last_val=='index.php' || last_val==''){
//                            $('div#last_msg_loader').html('<img src="images/200_s.gif">');
				last_msg_funtion();
				}
        }
    });

    setInterval(flag_change, 2000);
    
    function flag_change(){
        var lang = $(".goog-te-menu-value span").html();
//        console.log(lang);
    if (lang == "Urdu") {
        $(".goog-te-gadget-icon").attr("src", "images/pk.png");
    } else if (lang == "English") {
        $(".goog-te-gadget-icon").attr("src", "images/eng.png");
    }else if(lang == "Select Language"){
        //$(".goog-te-menu-value span").html("English");
        $(".goog-te-gadget-icon").attr("src", "images/eng.png");
    }
    }
    
    function last_msg_funtion()
    {
        var searchby=[];
        var ID = $(".post_box:last").attr("id");
        var price=$("#price-order").html();
        var pricevalue=$(".lowPrice:last").html();
        var search=$("#search").html();
        var category=$(".category").attr("id");

             $('div#last_msg_loader').html('<img src="images/200_s.gif">');
           $.post("index.php?action=get&last_msg_id=" +ID+"&category="+category+"&price="+price+"&pricevalue="+pricevalue+"&search="+search,
                function (data) {
                    if (data != "") {
                        $(".post_box:last").after(data);
                        
                    }
                    
                }); 
                $('div#last_msg_loader').empty();
//        }
        
        last_id = ID;
    }
    ;
});
        var favorite = 'favorite';
        var exdays= 365;
        var total = Cookies.get(favorite);
//        alert(total);
        if(total!=null){
        var total = total.split(",");
        }else{
        total = new Array();
        }
        
$('body').on('click', '.bmark', function () {
    $(this).removeClass('bmark');
            $(this).addClass('cookie');
//    $(this).toggleClass('bmark','cookie');
    var id = $(this).data("post-id");
                id = id.toString();
                console.log(total);
                total.splice($.inArray(id, total), 1);
                console.log(total);
                console.log(total.length);
                $('.fav').html(total.length);
                //postids.push(id);
                //alert(name);
                //console.log(postids);
                if(total.length!=0){
//                  setCookie(favorite, total, exdays);
                  Cookies.set(favorite, total, { expires: exdays});
                }
                else{
//                    setCookie(favorite, favorite, -2);
                    Cookies.remove(favorite);
                }
});

$('body').on('click', '.cookie', function () {
//                alert('alert');
//            $(this).toggleClass('bmark','cookie');
            $(this).removeClass('cookie');
            $(this).addClass('bmark');
            var id = $(this).data("post-id");
            total.push(id);
            //alert(name);
            //console.log(postids);
//            setCookie(favorite, total, exdays);
            Cookies.set(favorite, total, { expires: exdays});
            console.log(total);
            //alert(total.length);
            $('.fav').html(total.length);
        });
        
$('body').on('click','.fremove',function(){
//           setCookie(favorite, total, -2);
           Cookies.remove(favorite);
           $('.add-favorite-button').find('.bmark').toggleClass('bmark cookie');
           $('.fav').html(0);
           $(location).attr('href', 'index.php');
        });