<?php
include_once 'classes/realestate.php';

    $obj=new realestate();
    $param['submit']='fresh';
    $get_data = $obj->contactus($param);
    while ($row = mysqli_fetch_array($get_data)) {
        $_DATA[$row['name']]=$row['value'];
    }

$obj = new realestate();
if (!isset($_GET['get_id'])) {
    header('Location:index.php');
} else {
$param['post_id'] = $_GET['get_id'];

    $row = $obj->get_post($param);
    $main_post = mysqli_fetch_array($row);
    switch ($main_post['category']) {
        case 1: $category = 'Apartment';
            break;
        case 2: $category = 'House';
            break;
        case 3: $category = 'Commercial';
            break;
    }
    
    $post_images = $obj->get_images($param);

    $param['next_id'] = TRUE;
    $next_row = $obj->get_post($param);
    $next_id = mysqli_fetch_array($next_row);
    $param['next_id'] = FALSE;

    $param['previous_id'] = TRUE;
    $previous_row  = $obj->get_post($param);
    $previous_id = mysqli_fetch_array($previous_row);
    $param['previous_id'] = FALSE;
    
   $param['post_id'] = $main_post['sim1'];
    $row3 = $obj->get_post($param);
    $sim1 = mysqli_fetch_array($row3);
    switch ($sim1['category']) {
        case 1: $category = 'Apartment';
            break;
        case 2: $category = 'House';
            break;
        case 3: $category = 'Commercial';
            break;
    }


    $param['post_id'] = $main_post['sim2'];
    $row4 = $obj->get_post($param);
    $sim2 = mysqli_fetch_array($row4);
    switch ($sim2['category']) {
        case 1: $category = 'Apartment';
            break;
        case 2: $category = 'House';
            break;
        case 3: $category = 'Commercial';
            break;
    }

}

if (isset($_POST['submit'])) {

    foreach ($_POST as $key => $value) {
        
        if (empty($_POST[$key])) {
            $error = 'Please fill the empty fields first';
        }
        
        if (($_POST[$key]=='email')) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
        }   
        }
        
        $_data[$key] = $value;
    }
    if (!isset($error)) {
        $to = 'green.solar.pakistan@gmail.com';
        $subject = 'About property';
        $message = '<h3>Hi Dear</h3><br>' . $_data['message'] . '<br> Property URL: http://textilagentur-pakistan.com' . $_data['url'] . '<br> Property ID: ' . $_data['post_id'] . '<br><br> Redards:<br> ' . $_data['name'] . '<br> ' . $_data['email'] . '<br> ' . $_data['phone'];
        $result = $obj->send_email($to, $subject, $message);
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
        <title><?php echo $main_post['title']; ?></title>
        <meta name="description" content="<?php echo $main_post['description']; ?>">
        <meta name="keywords" content="<?php echo $main_post['keywords']; ?>">
        <?php include 'inc/head.php'; ?>
    </head>
    <body>

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

                                    <div role="listbox" class="carousel-inner">
                                        <div class="item active">
                                            <img alt="<?php echo $main_post['fimage'] ?>" src="upload/<?php echo $main_post['fimage'] ?>" class="first-slide">
                                        </div>
                                        <?php
                                        $images = 0;
                                        while ($row1 = mysqli_fetch_array($post_images)) {
                                            ?>
                                            <div class="item ">
                                                <img alt="<?php echo $row1['name'] ?>" src="upload/<?php echo $row1['name'] ?>" class="second-slide">
                                            </div>    
                                            <?php
                                            $images++;
                                        }
                                        ?>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-slide-to="0" data-target="#myCarousel" class="active" ></li>
                                        <?php
                                        mysqli_data_seek($post_images, 0);
                                        $i = 0;
                                        while ($i < $images) {
                                            ?>
                                            <li data-slide-to="<?php echo ++$i; ?>" data-target="#myCarousel" class=""></li>
                                        <?php } ?>

                                    </ol>
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
                                <a itemprop="url" itemref="bbc" href=""><span itemprop="title"><?php echo $category; ?></span></a><a itemprop="url" itemref="bbc" href=""><span itemprop="title"><?php echo $main_post['city'] ?></span></a>
                            </div>
                            <!--<div itemref="cbc" itemprop="child" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" id="bbc"><a itemprop="url" href="" class="prevent"><span itemprop="title">Spain</span></a></div><div itemref="dbc" itemprop="child" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" id="cbc"><a itemprop="url" href="" class="prevent"><span itemprop="title">Costa Blanca</span></a></div><div itemprop="child" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" id="dbc"><a itemprop="url" href="#" class="prevent"><span itemprop="title">Guardamar del Segura</span></a></div><div class="object_sku">ES-82517</div>-->
                        </div>
                        <h1 itemprop="name" class="info-title"><?php echo $main_post['name'] ?></h1>

                        <div class="row single-object-row">
                            <div class="single-object-main-col col-sm-12 col-md-8">
                                <div class="row">
                                    <div class="object_info_left col-sm-12">
                                        <div itemtype="http://schema.org/AggregateOffer" itemscope="" itemprop="offers" class="row price-row">
                                            <p itemprop="price" class="object_price"><span itemprop="lowPrice"><?php echo $main_post['price'] ?></span>&nbsp;<span content="rs" itemprop="priceCurrency">R.S</span></p><span  class="glyphicon glyphicon-bookmark <?php if(isset($cookie)){echo in_array($main_post['post_id'], $cookie)?"bmark":"cookie";}else{echo "cookie";} ?>" data-post-id="<?php echo $main_post['post_id']; ?>"><span class="glyphicon glyphicon-star"></span></span></div>

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
                                         */ ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-object-form-col col-sm-12 col-md-4">
                                <div class="object_download_wrap clearfix">
                                    <div class="icon-info"></div>
                                    <form method="post" data-remote="true" accept-charset="UTF-8" action="" class="new_request" id="object_download_form">

                                        <?php if(isset($error) || isset($result)){?>
                                        <div id="short-form-validation">
                                        <?php if(isset($error)){?>    
                                            <div class="error-form-message email_message">
                                                <span class="text-danger"><?php echo $error; ?></span>
                                            </div>
                                        <?php }elseif(isset($result)){?>
                                            <div class="success-form-message">
                                                <div>
                                                <span class="text-success">Thank you, request was received. We will send detailed information about the object, including plans, prices and review information soon.</span>
                                            </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php  } ?>
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
                                                    <a href="privacy.php">Read more</a> about our Privacy policy
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

                    <a href="single.php?get_id=<?php echo empty($next_id)?$main_post['post_id']:$next_id['post_id']; ?>" class="col-xs-4 prev-btn text-center">
                        <i class="glyphicon glyphicon-arrow-left"></i> <span class="hidden-xs"><?php echo empty($next_id)?'No More':'Previous property'; ?></span>
                    </a>

                    <a href="index.php" class="col-xs-4 back-btn text-center">
                        <i class="glyphicon glyphicon-share-alt icon-flipped"></i> <span class="hidden-xs">back to the list</span>
                    </a>

                    <a href="single.php?get_id=<?php echo empty($previous_id)?$main_post['post_id']:$previous_id['post_id']; ?>" class="col-xs-4 next-btn text-center disabled">
                        <span class="hidden-xs"><?php echo empty($previous_id)?'No More':'Next Property'; ?></span> <i class="glyphicon glyphicon-arrow-right"></i>
                    </a>

                </div>


                <div id="similar-objects"><h2 class="similar-objects-title">Similar properties for sale:</h2>
                    <div class="init-content-holder objects-list-wrapper" id="init-objects-holder">
                        <article itemtype="" itemscope="" class="object-item object-item-regular col-xs-12 col-sm-12 col-md-6">
                            <div class="object-inner-wrapper">

                                <div class="object-thumbnail">
                                    <a href="single.php?get_id=<?php echo $sim1['post_id']; ?>" target="_self" itemprop="url" title="<?php echo $sim1['name']; ?>" class="object-thumbnail-holder"><img src="upload/<?php echo $sim1['fimage']; ?>" itemprop="image" alt="<?php echo $sim1['name']; ?>" class="img-responsive"></a>      <div class="add-favorite-button">
                                        <span class="glyphicon glyphicon-bookmark <?php if(isset($cookie)){echo in_array($row['post_id'], $cookie)?"bmark":"cookie";}else{echo "cookie";} ?>" data-post-id="<?php echo $sim1['post_id']; ?>"><span class="glyphicon glyphicon-star"></span></span>
                                    </div>
                                </div>

                                <div class="object-info-holder">
                                    <div class="info-address">
                                        <a href="single.php?get_id=<?php echo $sim1['post_id']; ?>" title="<?php echo $sim1['city']; ?>" class=""><?php echo $sim1['city']; ?></a><a href="" title="<?php echo $category; ?>" class=""><?php echo $category; ?></a>
                                    </div>
                                    <h2 itemprop="name" class="info-title">
                                        <a href="single.php?get_id=<?php echo $sim1['post_id']; ?>" target="_self" title="<?php echo $sim1['name']; ?>"><?php echo $sim1['name']; ?></a>
                                    </h2>
                                    <p class="info-details">
                                        <span itemtype="http://schema.org/AggregateOffer" itemscope="" itemprop="offers"><span itemprop="lowPrice"><?php echo $sim1['price']; ?></span>&nbsp;<span content="EUR" itemprop="priceCurrency">R.S</span></span>, <span><?php echo $sim1['rooms']; ?>&nbsp;rooms</span>, <span><?php echo $sim1['area']; ?>&nbsp;m<sup>2</sup></span>
                                    </p>
                                </div>

                            </div>
                        </article>
                        <article itemtype="" itemscope="" class="object-item object-item-regular col-xs-12 col-sm-12 col-md-6">
                            <div class="object-inner-wrapper">

                                <div class="object-thumbnail">
                                    <a href="single.php?get_id=<?php echo $sim2['post_id']; ?>" target="_self" itemprop="url" title="<?php echo $sim2['name']; ?>" class="object-thumbnail-holder"><img src="upload/<?php echo $sim2['fimage']; ?>" itemprop="image" alt="<?php echo $sim2['name']; ?>" class="img-responsive"></a>      <div class="add-favorite-button">
                                        <span class="glyphicon glyphicon-bookmark <?php if(isset($cookie)){echo in_array($row['post_id'], $cookie)?"bmark":"cookie";}else{echo "cookie";} ?>" data-post-id="<?php echo $sim2['post_id']; ?>"><span class="glyphicon glyphicon-star"></span></span>
                                    </div>
                                </div>

                                <div class="object-info-holder">
                                    <div class="info-address">
                                        <a href="single.php?get_id=<?php echo $sim2['post_id']; ?>" title="<?php echo $sim2['city']; ?>" class=""><?php echo $sim2['city']; ?></a><a href="" title="<?php echo $category; ?>" class=""><?php echo $category; ?></a>
                                    </div>
                                    <h2 itemprop="name" class="info-title">
                                        <a href="single.php?get_id=<?php echo $sim2['post_id']; ?>" target="_self" title="<?php echo $sim2['name']; ?>"><?php echo $sim2['name']; ?></a>
                                    </h2>
                                    <p class="info-details">
                                        <span itemtype="http://schema.org/AggregateOffer" itemscope="" itemprop="offers"><span itemprop="lowPrice"><?php echo $sim2['price']; ?></span>&nbsp;<span content="EUR" itemprop="priceCurrency">R.S</span></span>, <span><?php echo $sim2['rooms']; ?>&nbsp;rooms</span>, <span><?php echo $sim2['area']; ?>&nbsp;m<sup>2</sup></span>
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
