<?php
include_once 'classes/realestate.php';
    $obj=new realestate();
    $param['submit']='fresh';
    $get_data = $obj->contactus($param);
    while ($row = mysqli_fetch_array($get_data)) {
        $_DATA[$row['name']]=$row['value'];
    }
    
    
    if (isset($_POST['submit'])) {
        

    foreach ($_POST as $key => $value) {
        
        if (empty($_POST[$key])) {
            $error = 'style="display:block;"';
//            exit('foreach');
        }
        $_data[$key] = $value;
    }
    
    if (!isset($error)) {
//        print_r($_data);
        $to = 'green.solar.pakistan@gmail.com';
        $subject = 'Infromation about investment ';
        $message = '<h3>Hi Dear</h3><br>' . $_data['message'] . '<br><br> Redards:<br> ' . $_data['name'] . '<br> ' . $_data['email'] . '<br> ' . $_data['phone'];
        //echo $message;
        $result = $obj->send_email($to, $subject, $message);
        if($result== TRUE){
            $result='style="display:block;"';
        }else{
            $result_fail='style="display:block;"';
        }
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
        <title>About US | The Leading Properties of the Pakistan</title>
        <meta name="keywords" content="real estate for sale, real estate in pakistan, real estate in lahore, real estate in Faisalabad, real estate in karachi, real estate in islamabad, real estate in rawalpindi, real estate in quita, real estate in pashawar">
        <?php include 'inc/head.php'; ?>
    </head>
    <body>


        <header>
            <?php include 'inc/header.php'; ?>
        </header>
        <section class="about-section">
            <div class="about_wrap">
                <div class="about_section about_section_grey about_section_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 about-top-col"><h1>Pakistan's Best Real Estate Marketplace</h1>

                                <p>We are an international company with a special focus on the sale and marketing of high-end residential property</p></div>
                        </div>
                    </div>
                </div>
                <div class="about_section about_section_sell">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 about-image-col">
                                <img src="images/sales.svg" class="about_img img-responsive">
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <div class="about_text"><h2>High-end residential property</h2>

                                    <p>Bismillah Estate.com caters to the needs of both real estate buyers and sellers. Our objective is to help individuals in the property market to find their ideal home, land or commercial property. We also provide state of the art services and features for Pakistan real estate agents. Our aim is to empower consumers with the most detailed and dependable information in the market. Lamudi will revolutionize real estate buying and selling in Pakistan.</p></div>
                                <a href="add-property.php" class="about_section_sell_link">Go to add property page<sup class="sup-free">FREE</sup> </a></div>
                        </div>
                    </div>
                </div>
                <div class="about_section about_section_grey about_section_search">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-sm-push-8 col-xs-12 about-image-col">
                                <img src="images/search.svg" class="about_img img-responsive">
                            </div>
                            <div class="col-xs-12 col-sm-8 col-sm-pull-4 col-xs-12 about_text">
                                <h2>Sale and individual property search</h2>

                                <p>Bismillah Estate.com helps you to get in touch with the agents who have the direct mandate for the property from the owner. This brings increased efficiency to the property market in Pakistan. For the agents, we bring in quality leads, connections and tools to manage and develop client base.</p></div>
                        </div>
                    </div>
                </div>
                <div class="about_section about_section_investments">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 about-image-col">
                                <img src="images/investments.svg" class="about_img">
                            </div>
                            <div class="col-xs-12 col-sm-8 about_text"><h2>A Rocket Internet Venture</h2>

                                <p>Lamudi is a part of the Rocket Internet family which is the fastest and the most successful online venture builder across the globe. With an exceptional team, that has been building online companies since 1999 and has created over 100 market leading companies in 40+ countries. We bring unrivaled expertise from launching of various ventures. In Pakistan, we have successfully launched several ventures and employed over 200 people. Superior expertise and proficiency of an international company together with an acute understanding of the local market, we bring you the best online real estate market place in Pakistan.</p></div>
                        </div>
                    </div>
                </div>

                <section class="contact-section about_section_contact">
                    <div class="container">

                        <div class="figure-stripe-down"><span></span></div>
                        <div class="above-form-section">
                            <p class="contact-section-text">
                                Request for a detailed description and examples of our investment projects or ask your question related to investments in high-quality residential real estate<sup class="sup-free">FREE</sup>
                            </p>
                        </div>

                        <form method="post" data-remote="true" accept-charset="UTF-8" action="about.php" class="contact-form" id="contact-form">
                            <div class="form-message error-form-message" <?php echo isset($error)?$error:''; ?>><p>We need your contact information to answer your question. Please, fill all fields.</p></div>
                            <div class="form-message error-form-message" <?php echo isset($result_fail)?$result_fail:''; ?>><p>Please Try again later</p></div>
                            <div class="form-message success-form-message" <?php echo isset($result)?$result:''; ?>><p>Thank you, your request was received.</p></div>
                            <div class="form-row">
                                <div class="form-group form-group-name">
                                    <input type="text" id="request_name" name="name" placeholder="Enter your name" class="get_info_name form-control">
                                </div>
                                <div class="form-group form-group-email">
                                    <input type="email" id="request_email" name="email" placeholder="your email" class="get_info_email paired form-control">
                                </div>
                                <div class="form-group form-group-phone">
                                    <input type="text" id="request_phone" name="phone" placeholder="your phone" class="get_info_phone paired form-control">
                                </div>
                                <div class="form-group form-group-message">
                                    <textarea id="request_message" name="message" placeholder="your message" class="textarea form-control"></textarea>
                                </div>
                                <div class="form-inner-row">
                                    <div class="form-group form-group-button">
                                        <input type="submit" id="submit" class="submit" value="Send your request" name="submit">
                                    </div>
                                    <div class="form-group form-group-disclaimer">
                                        <div class="disclaimer-content-wrapper"><i class="glyphicon glyphicon-lock"></i>
                                            <p class="note-text">Your contact details will be used only to provide you with more information about the property.<br>
                                                <a href="privacy.php">Read more</a> about our Privacy policy
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </section>

        <footer>
            <?php include 'inc/footer.php'; ?>
        </footer>
    </body>
</html>
