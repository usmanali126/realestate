<?php
if (isset($_POST['submit'])) {
//  print_r($_POST);
//$param=$_POST['image'];
    print_r($_FILES);
//echo $size = $_FILES["image"]["size"];
//$param=$_FILES["img"]["tmp_name"];
    //exit();
    $target_dir = "upload/";
    //$size = $_FILES["img"]["size"];
    $formate = 'dmYHis';
    date_default_timezone_set('Asia/Karachi');
    $timestemp = date($formate, time());
    //$randstr = new realestate();
    $i=0;
    foreach ($_FILES["images"]["name"] as $value) {
        echo $ImgName = $timestemp . basename($value);
        echo $target_file = $target_dir . $ImgName;
        $result = move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_file);
        $i++;
    }

    //printf(move_uploaded_file($_POST['image'], $target_file));
    if ($result == TRUE) {
        echo 'uploaded';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    exit();
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
            <?php //include 'inc/header.php';  ?>
        </header>
        <div class="container">
            <div data-ride="carousel" class="carousel slide" id="myCarousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#myCarousel" class="active" ></li>
                    <li data-slide-to="1" data-target="#myCarousel" class=""></li>
                    <li data-slide-to="2" data-target="#myCarousel" class=""></li>
                </ol>
                <div role="listbox" class="carousel-inner">
                    <div class="item active">
                        <img alt="First slide" src="images/img1.jpg" class="first-slide">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Example headline.</h1>
                                <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                                <p><a role="button" href="#" class="btn btn-lg btn-primary">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <img alt="Second slide" src="images/img2.jpg" class="second-slide">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Another example headline.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><a role="button" href="#" class="btn btn-lg btn-primary">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img alt="Third slide" src="images/img3.jpg" class="third-slide">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>One more for good measure.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><a role="button" href="#" class="btn btn-lg btn-primary">Browse gallery</a></p>
                            </div>
                        </div>
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
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="images[]" multiple="">
            <input type="submit" name="submit">
        </form>
        <footer>
            <?php include 'inc/footer.php'; ?>
        </footer>
    </body>
</html>
