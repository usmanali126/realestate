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
    
    
    function last_msg_funtion()
    {
        var searchby=[];
        var ID = $(".post_box:last").attr("id");
        var price=$("#price-order").html();
        var pricevalue=$(".lowPrice:last").html();
        var search=$("#search").html();
        var category=$(".category").attr("id");
        
//        if(price!=''){
//          searchby['price']= price;  
//        }else if(search_name!=''){
//          searchby['search'] = search_name;  
//        }else{
//          searchby['category'] = category;  
//        }
        
//        var parameters = {  "searchby": searchby};
        
//       if(ID != last_id){
//           alert(searchby['search']);
//           exit;
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