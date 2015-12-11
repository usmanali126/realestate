<?php 
include 'classes/realestate.php';
$obj=new realestate();
if(!isset($_GET['get_id'])){
    header('Location:index.php');
}else{
    $param['post_id']=$_GET['get_id'];
    
    $row= $obj->get_post($param);
    $main_post=  mysqli_fetch_array($row);
//    print_r($main_post);
    
}

if(isset($_POST['submit'])){
    
    foreach ($_POST as $key => $value) {
        if(empty($_POST[$key])){
            $error=true;
        }
        $_data[$key]=$value;
    }
    if(!isset($error)){
      print_r($_data);
      $to='abc@xyz.com';
      $subject='About property';
      $message='<h2>Hi Dear</h2><br>'.$_data['message'].'<br> Property URL: '.$_data['url'].'<br> Property ID: '.$_data['post_id'].'<br><br> Redards:<br> '.$_data['name'].'<br> '.$_data['email'].'<br> '.$_data['phone'];
      //echo $message;
      $result=$obj->send_email($to,$subject,$message);
    }
    
}

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'inc/head.php'; ?>
    </head>
    <body>

        <div id="cookie-message" class="cookie-message-wrapper" style="display: block;">
            <div class="container">
                <div class="row">
                    <div class="message-col col-xs-10 col-sm-9 col-md-10">
                        <p>We use cookies to ensure that we give you the best experience on our website. If you continue without changing your settings, we'll assume that you are happy to receive all cookies from this website. If you would like to change your preferences you may do so by <a href="#">following the instructions</a>.</p>
                    </div>
                    <div class="button-col col-xs-2 col-sm-3 col-md-2">
                        <span id="cookie-message-button" class="button-close-cookie"> <span class="hidden-xs button-close-cookie-text">Close <span class="glyphicon glyphicon-remove"></span></span> </span>
                    </div>
                </div>
            </div>
        </div> 

        <header>
            <?php include 'inc/header.php'; ?>
        </header>
        <div class="section section-main-content" id="single">
            <div class="container">
                <article itemtype="http://schema.org/Product" itemscope="" id="single-page-object-item" class="object-item">
                    <div class="images-slider-holder ">
                        <div class="bx-wrapper">
                            <div class="bx-viewport">
                                <div data-ride="carousel" class="carousel slide" id="myCarousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-slide-to="0" data-target="#myCarousel" class="active" ></li>
                                        <li data-slide-to="1" data-target="#myCarousel" class=""></li>
                                        <li data-slide-to="2" data-target="#myCarousel" class=""></li>
                                    </ol>
                                    <div role="listbox" class="carousel-inner">
                                        <div class="item active">
                                            <img alt="First slide" src="upload/<?php echo $main_post['fimage'] ?>" class="first-slide">
                                        </div>
                                        <div class="item ">
                                            <img alt="Second slide" src="images/img2.jpg" class="second-slide">
                                        </div>
                                        <div class="item">
                                            <img alt="Third slide" src="images/img3.jpg" class="third-slide">
                                        </div>
                                    </div>
                                    <a data-slide="prev" role="button" href="#myCarousel" class="left carousel-control">
                                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a data-slide="next" role="button" href="#myCarousel" class="right carousel-control">
                                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="object-info-holder">

                        <div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="info-address clearfix">
                            <div>
                                <a itemprop="url" itemref="bbc" href="index.php"><span itemprop="title">Realestate</span></a><a itemprop="url" itemref="bbc" href="/"><span itemprop="title"><?php echo $main_post['city'] ?></span></a>
                            </div>
                            <!--<div itemref="cbc" itemprop="child" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" id="bbc"><a itemprop="url" href="" class="prevent"><span itemprop="title">Spain</span></a></div><div itemref="dbc" itemprop="child" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" id="cbc"><a itemprop="url" href="" class="prevent"><span itemprop="title">Costa Blanca</span></a></div><div itemprop="child" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" id="dbc"><a itemprop="url" href="#" class="prevent"><span itemprop="title">Guardamar del Segura</span></a></div><div class="object_sku">ES-82517</div>-->
                        </div>



                        <h1 itemprop="name" class="info-title"><?php echo $main_post['name'] ?></h1>

                        <div class="row single-object-row">
                            <div class="single-object-main-col col-sm-12 col-md-8">
                                <div class="row">
                                    <div class="object_info_left col-sm-12">
                                        <div itemtype="http://schema.org/AggregateOffer" itemscope="" itemprop="offers" class="row price-row">
                                            <p itemprop="price" class="object_price"><span itemprop="lowPrice"><?php echo $main_post['price'] ?></span>&nbsp;<span content="rs" itemprop="priceCurrency">R.S</span></p><span data-obj_id="82517" class="glyphicon glyphicon-bookmark"><span class="glyphicon glyphicon-star"></span></span></div>

                                        <div itemprop="description" class="description">
                                            <p><?php echo $main_post['about'] ?></p>
                                        </div>
                                    </div>

                                    <div class="object_info_right col-sm-12">
                                        <div class="object_properties clearfix">
                                            <ul><li class="col-xs-6">number of rooms</li><li class="col-xs-6"><?php echo $main_post['rooms'] ?></li><li class="col-xs-6">area, sq. m</li><li class="col-xs-6"><?php echo $main_post['area'] ?></li><li class="col-xs-6">parking/garage</li><li class="col-xs-6"><?php echo $main_post['parking'] ?></li></ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="object_bottom row">
                                    <div class="object-bottom-left col-xs-12">
                                        <p class="object_address">
                                            <?php echo $main_post['address'] ?>
                                        </p>

                                        <noindex>
                                            <a rel="nofollow" target="_blank" class="icon_link" href="<?php echo $main_post['location']; ?>">
                                                <span class="glyphicon glyphicon-globe"></span> <span class="map_location_text">show on the map</span>
                                            </a>
                                        </noindex>

                                    </div>
                                    <div class="object-bottom-right col-xs-12">
                                    <?php /*    <noindex>
                                            <a href="/pdf/82517?code=ES-82517&amp;lang=en&amp;url=es-82517-bungalow-for-sale-in-guardamar-del-segura-costa-blanca" data-remote="true" rel="nofollow" id="icon-download-pdf" class="icon-download-pdf" data-url="https://api-lpw.herokuapp.com/v1/objects/82517/pdf-download?locale=en&amp;t=00711a0ae6fd45aae365cc84861c08e4"></a>
                                        </noindex>
                                        <div style="display: none" id="pdf-download-notice">
                                            <p>Generating pdf. <span class="icon-spin2 animate-spin"></span></p>
                                        </div>
                                           */?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-object-form-col col-sm-12 col-md-4">
                                <div class="object_download_wrap clearfix">
                                    <div class="icon-info"></div>
                                    <form method="post" data-remote="true" accept-charset="UTF-8" action="" class="new_request" id="object_download_form">


                                        <div id="short-form-validation">
                                            <div class="form-message error-form-message email_message">
                                                <div class="container"><p>Please check your e-mail it seems that there is an error</p><span class="icon icon-26 close-alert"></span></div>
                                            </div>
                                            <div class="form-message error-form-message phone_message">
                                                <div class="container"><p>Please check your telephone it seems that there is an error</p><span class="icon icon-26 close-alert"></span></div>
                                            </div>
                                            <div class="form-message success-form-message">
                                                <div class="container"><p>Thank you, request was received. We will send detailed information about the object, including plans, prices and review information soon.</p><span class="icon icon-26 close-alert"></span></div>
                                            </div>
                                        </div>

                                        <div class="object_download">
                                            <div class="od_carrot">
                                                <div class="get_info_text">
                                                    <p>Get detailed information about the property: additional photos plans and prices<sup class="sup-free">FREE</sup></p>
                                                </div>
                                                <div class="object_download_carrot"></div>
                                            </div>
                                            <div class="od_carrot ">
                                                <div class="get_info_form clearfix">
                                                    <input type="text" id="request_name" name="name" placeholder="Enter your name" class="get_info_name">
                                                    <input type="email" id="request_email" name="email" placeholder="your email" class="get_info_email paired">
                                                    <input type="tel" id="request_phone" name="phone" placeholder="or your phone" class="get_info_phone paired">
                                                    <textarea id="request_message" name="message" placeholder="and your question" class="get_info_question"></textarea>
                                                    <input type="hidden" id="request_property_url" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                                    <input type="hidden" id="request_prop_id" name="post_id" value="<?php echo $main_post['post_id'] ?>">
                                                </div>
                                            </div>
                                            <div class=" ">
                                                <div class="get_info_btn">
                                                    <input type="submit" class="button" value="submit" name="submit">
                                                </div>
                                                <div class="object_download_carrot"></div>
                                            </div>
                                        </div>
                                        <div class="disclaimer-note">
                                            <div class="note-holder">
                                                <i class="glyphicon "></i>
                                                <p class="note-text">
                                                    Your contact details will be used only to provide you with more information about the property.
                                                    <a href="">Read more</a> about our Privacy policy
                                                </p>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </article>

                <div class="clearfix" id="object_navigation">

                    <a href="" class="col-xs-4 prev-btn text-center">
                        <i class="glyphicon glyphicon-arrow-left"></i> <span class="hidden-xs">previous property</span>
                    </a>

                    <a href="index.php" class="col-xs-4 back-btn text-center">
                        <i class="glyphicon glyphicon-share-alt icon-flipped"></i> <span class="hidden-xs">back to the list</span>
                    </a>

                    <a href="" class="col-xs-4 next-btn text-center disabled">
                        <span class="hidden-xs">next property</span> <i class="glyphicon glyphicon-arrow-right"></i>
                    </a>

                </div>


                <div id="similar-objects"><h2 class="similar-objects-title">Similar properties for sale:</h2>
                    <div class="init-content-holder objects-list-wrapper" id="init-objects-holder">
                        <article itemtype="" itemscope="" class="object-item object-item-regular col-xs-12 col-sm-12 col-md-6">
                            <div class="object-inner-wrapper">

                                <div class="object-thumbnail">
                                    <a href="" target="_self" itemprop="url" title="Bungalow for sale in Guardamar del Segura, Costa Blanca" class="object-thumbnail-holder"><img src="https://d18mncbmmvtpqd.cloudfront.net/2015/11/136.jpg" itemprop="image" alt="Bungalow for sale in Guardamar del Segura, Costa Blanca" class="img-responsive"></a>      <div data-obj_id="82481" class="add-favorite-button">
                                        <span class="glyphicon glyphicon-bookmark"><span class="glyphicon glyphicon-star"></span></span>
                                    </div>
                                </div>

                                <div class="object-info-holder">
                                    <div class="info-address">
                                        <a href="" title="Spain" class="">Spain</a><a href="" title="Costa Blanca" class="">Costa Blanca</a><a href="" title="Guardamar del Segura" class="empty">Guardamar del Segura</a>
                                    </div>
                                    <h2 itemprop="name" class="info-title">
                                        <a href="" target="_self" title="Bungalow for sale in Guardamar del Segura, Costa Blanca">Bungalow for sale in Guardamar del Segura, Costa Blanca</a>
                                    </h2>
                                    <p class="info-details">
                                        <span itemtype="http://schema.org/AggregateOffer" itemscope="" itemprop="offers"><span itemprop="lowPrice">149 000</span>&nbsp;<span content="EUR" itemprop="priceCurrency">EUR</span></span>, <span>4&nbsp;rooms</span>, <span>98&nbsp;m<sup>2</sup></span>
                                    </p>
                                </div>

                            </div>
                        </article>
                        <article itemtype="http://schema.org/Product" itemscope="" class="object-item object-item-regular col-xs-12 col-sm-12 col-md-6">
                            <div class="object-inner-wrapper">

                                <div class="object-thumbnail">
                                    <a href="" target="_self" itemprop="url" title="Apartment for sale in Guardamar del Segura, Costa Blanca" class="object-thumbnail-holder"><img src="https://d18mncbmmvtpqd.cloudfront.net/2015/11/05.jpg" itemprop="image" alt="Apartment for sale in Guardamar del Segura, Costa Blanca" class="img-responsive"></a>      <div data-obj_id="82184" class="add-favorite-button">
                                        <span class="glyphicon glyphicon-bookmark"><span class="glyphicon glyphicon-star"></span></span>
                                    </div>
                                </div>

                                <div class="object-info-holder">
                                    <div class="info-address">
                                        <a href="" title="Spain" class="">Spain</a><a href="" title="Costa Blanca" class="">Costa Blanca</a><a href="" title="Guardamar del Segura" class="empty">Guardamar del Segura</a>
                                    </div>
                                    <h2 itemprop="name" class="info-title">
                                        <a href="" target="_self" title="Apartment for sale in Guardamar del Segura, Costa Blanca">Apartment for sale in Guardamar del Segura, Costa Blanca</a>
                                    </h2>
                                    <p class="info-details">
                                        <span itemtype="http://schema.org/AggregateOffer" itemscope="" itemprop="offers"><span itemprop="lowPrice">245 000</span>&nbsp;<span content="EUR" itemprop="priceCurrency">EUR</span></span>, <span>3&nbsp;rooms</span>, <span>118&nbsp;m<sup>2</sup></span>
                                    </p>
                                </div>

                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <?php include 'inc/footer.php'; ?>
        </footer>
    </body>
</html>
