<?php
include_once 'classes/realestate.php';
    $obj=new realestate();
    $param['submit']='fresh';
    $get_data = $obj->contactus($param);
    while ($row = mysqli_fetch_array($get_data)) {
        $_DATA[$row['name']]=$row['value'];
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
        <title>Add Property | The Leading Properties of the Pakistan</title>
        <meta name="description" content="Post information about your real estate property on our website free of charge. Provide a description, photos. Click here to learn more about our services.">
        <meta name="keywords" content="real estate for sale, real estate in pakistan, real estate in lahore, real estate in Faisalabad, real estate in karachi, real estate in islamabad, real estate in rawalpindi, real estate in quita, real estate in pashawar">
        <?php include 'inc/head.php'; ?>
    </head>
    <body>

        <header>
            <?php include 'inc/header.php'; ?>
        </header>
        <section class="section-main-content">
            <div id='upload_add_object' class="add-object-section-top add-object-sub-section">
                <div class="container">
                    <div class="row">
                        <div class="image_holder col-sm-4 col-xs-12 col-md-5">
                            <img class="img-responsive" src="images/upload_add.png" alt="">
                        </div>
                        <div class="text_holder col-xs-12 col-sm-8 col-md-7">
                            <h2 class="heading">Add your property <span class="free">FREE</span></h2>
                            <p>Post information about your real estate property on our website free of charge, providing to The Leading Properties of the World Corporation a full description, high-quality photos, and a power-of-attorney for the sale of your property.</p>
                        </div>
                    </div>

                    <div id="scroll_up" class="to_top_visible hidden-xs"><span class="glyphicon glyphicon-arrow-up"></span></div>
                </div>
            </div>
            <div class="add-object-section-photo add-object-sub-section" id="upload_photos">
                <div class="container">
                    <div class="row">
                        <div class="image_holder col-sm-4 col-xs-12 col-sm-push-8 col-md-5 col-md-push-7">
                            <img src="images/upload_photo.png" alt="">
                        </div>
                        <div class="text_holder col-sm-8 col-xs-12 col-sm-pull-4 col-md-pull-5 col-md-7"><h2>Photos</h2>

                            <div class="text">
                                <p>Property items submitted for posting on our site are only accepted if photographs are provided. Photos must be at least 1,140 pixels wide and 670 pixels high. Photos must be saved in either jpeg (with the highest resolution), png, or tiff format. The number of photographs per item cannot exceed 10.</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-object-section-description add-object-sub-section" id="upload_object_descr">
                <div class="container">
                    <div class="row">
                        <div class="image_holder col-sm-4 col-xs-12 col-md-5">
                            <img src="images/upload_description.png" alt="">
                        </div>
                        <div class="text_holder col-sm-8 col-xs-12 col-md-7"><h2>Your property description</h2>

                            <div class="text">
                                <p>Property descriptions must include the property address, property value, a title (up to 60 characters, including spaces), a short descriptive text (up to 550 characters, including spaces), the main features of the property (number of apartments, current state, surface area, number of rooms, existence of a parking lot or garage, existence of a balcony or terrace, swimming pool, garden, etc.)</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-object-section-mandate add-object-sub-section" id="upload_sell_mandate">
                <div class="container">
                    <div class="row">
                        <div class="image_holder col-sm-4 col-xs-12 col-sm-push-8 col-md-5 col-md-push-7">
                            <img src="images/upload_mandate.png" alt="">
                        </div>
                        <div class="text_holder col-sm-8 col-xs-12 col-sm-pull-4 col-md-7 col-md-pull-5">
                            <h2>Power-of-Attorney for Property Sale</h2>

                            <div class="text">
                                <p>Download the Property Sale Agreement Form, complete it, and return a signed copy to us by e-mail along with the description and photos of your property item.</p></div>
                            <a href="" class="icon_link">
                                <span class="icon icon-01"></span><span>download PDF</span> </a></div>
                    </div>
                </div>
            </div>
            <div class="add-object-section-mail add-object-sub-section" id="upload_email">
                <div class="container">
                    <div class="row">
                        <div class="image_holder col-xs-12"><a href="mailto:<?php echo $_DATA['hemail']; ?>">
                                <img src="images/upload_email.png" alt="">
                            </a></div>
                        <div class="text_holder col-xs-12">
                            <div class="text"><p>You can send your properties on our e-mail<br>
                                    <a href="mailto:<?php echo $_DATA['hemail']; ?>"><?php echo $_DATA['hemail']; ?></a></p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-object-section-results add-object-sub-section" id="upload_fast_result">
                <div class="container">
                    <div class="row">
                        <div class="image_holder col-sm-4 col-xs-12 col-sm-push-8 col-md-5 col-md-push-7">
                            <img src="images/upload_fastresult.png" alt="">
                        </div>
                        <div class="text_holder col-sm-8 col-xs-12 col-sm-pull-4 col-md-7 col-md-pull-5">
                            <h2>Would you like<br>to receive results faster?</h2>

                            <div class="text">
                                <p>After posting the information about your property on The Leading Properties of the World’s website, we will provide you with detailed recommendations on how to accelerate the selling process and obtain the best terms on your sale.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <?php include 'inc/footer.php'; ?>
        </footer>
    </body>
</html>
