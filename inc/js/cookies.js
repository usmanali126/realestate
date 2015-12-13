/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var favorite = 'favorite';
        var exdays= 365;
        var total = getCookie(favorite);
//        alert(total);
        if(total!=null){
        var total = total.split(",");
        }else{
        total = new Array();
        }
//        $(document).ready(function () {
            //var postids= new Array();
            
            $('body').on('click', '.bmark', function () {
//                alert('alert');
                $(this).removeClass('bmark');
                $(this).addClass('cookie');

                var id = $(this).data("post-id");
                id = id.toString()
                console.log(total);
                //index=total.indexOf(id);
                total.splice($.inArray(id, total), 1);
                console.log(total);
                console.log(total.length);
                $('.fav').html(total.length);
                //postids.push(id);
                //alert(name);
                //console.log(postids);
                if(total.length!=0){
                  setCookie(favorite, total, exdays);  
                }
                else{
                    setCookie(favorite, favorite, -2);
                }
                

            });

//        });

        
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
            //alert('cookie set');
        }

        function getCookie(name) {
            var dc = document.cookie;
            var prefix = name + "=";
            var begin = dc.indexOf("; " + prefix);
            if (begin == -1) {
                begin = dc.indexOf(prefix);
                if (begin != 0)
                    return null;
            }
            else
            {
                begin += 2;
                var end = document.cookie.indexOf(";", begin);
                if (end == -1) {
                    end = dc.length;
                }
            }
            return unescape(dc.substring(begin + prefix.length, end));
        }

        $('body').on('click', '.cookie', function () {
//                alert('alert');
            $(this).removeClass('cookie');
            $(this).addClass('bmark');
            var id = $(this).data("post-id");
            total.push(id);
            //alert(name);
            //console.log(postids);
            setCookie(favorite, total, exdays);
            console.log(total);
            //alert(total.length);
            $('.fav').html(total.length);
        });
        
        
        $('body').on('click','.fremove',function(){
           setCookie(favorite, total, -2);
           $('.add-favorite-button').find('.bmark').toggleClass('bmark cookie');
           $('.fav').html(0);
        });