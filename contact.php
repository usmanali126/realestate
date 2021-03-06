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
        $subject = 'Query';
        $message = '<h3>Hi Dear</h3><br>' . $_data['message'] . '<br><br> Redards:<br> ' . $_data['name'] . '<br> ' . $_data['email'] . '<br> ' . $_data['phone'];
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
        <title>Contact Us | The Leading Properties of the Pakistan</title>
        <meta name="description" content="The Leading Properties of the Pakistan — a national company with a special focus on the sale and marketing of high-end residential property">
        <meta name="keywords" content="real estate for sale, real estate in pakistan, real estate in lahore, real estate in Faisalabad, real estate in karachi, real estate in islamabad, real estate in rawalpindi, real estate in quita, real estate in pashawar">
        <?php include 'inc/head.php'; ?>
    </head>
    <body>
        <header>
            <?php include 'inc/header.php'; ?>
        </header>
        <section class="section-contact-page">
            <div class="contact_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 col-sm-push-6 contact_image_holder">
                            <img alt="" src="images/contacts.svg">
                        </div>
                        <div class="col-sm-6 col-xs-12 col-sm-pull-6 contact_information_holder">
                            <h1 class="contact_title">Contact information</h1>

                            <div class="contacts_holder">
                                <ul>
                                    <li><a href="tel:<?php echo $_DATA['hcell']; ?>">Mobile No: <?php echo $_DATA['hcell']; ?> </a></li>
                                    <li><a href="tel:<?php echo $_DATA['hlandline']; ?>">Phone No: <?php echo $_DATA['hlandline']; ?></a></li>
                                    <li><a href="mailto:<?php echo $_DATA['hemail']; ?>"><?php echo $_DATA['hemail']; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact_main">

                <section class="contact-section">
                    <div class="container">

                        <div class="above-form-section">
                            <h2 class="contact-section-title">Please contact us</h2>
                            <p class="contact-section-text">
                                if you have questions, you need <br class="visible-xs">an additional information <br class="visible-xs">or help <br class="visible-xs">with choosing a real estate property<sup class="sup-free">FREE</sup>
                            </p>
                        </div>

                        <form id="contact-form" class="contact-form" action="contact.php" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓">
                            <div class="form-message error-form-message" <?php echo isset($error)?$error:''; ?>><p>We need your contact information to answer your question. Please, fill all fields.</p></div>
                            <div class="form-message error-form-message" <?php echo isset($result_fail)?$result_fail:''; ?>><p>Please Try again later</p></div>
                            <div class="form-message success-form-message" <?php echo isset($result)?$result:''; ?>><p>Thank you, your request was received.</p></div>
                            <div class="form-row">
                                <div class="form-group form-group-name">
                                    <input class="get_info_name form-control" placeholder="Enter your name" type="text" name="name" id="request_name">
                                </div>
                                <div class="form-group form-group-email">
                                    <input class="get_info_email paired form-control" placeholder="your email" type="email" name="email" id="request_email">
                                </div>
                                <div class="form-group form-group-phone">
                                    <input class="get_info_phone paired form-control" placeholder="or your phone" type="tel" name="phone" id="request_phone">
                                </div>
                                <div class="form-group form-group-message">
                                    <textarea class="textarea form-control" placeholder="your message" name="message" id="request_message"></textarea>
                                </div>
                                <input value="en" type="hidden" name="request[lang]" id="request_lang">
                                <input value="0" type="hidden" name="request[prop_id]" id="request_prop_id">
                                <div class="form-inner-row">
                                    <div class="form-group form-group-button">
                                        <input type="submit" name="submit" value="Send your request" class="submit" id="submit">
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

                <div class="contact_section contact_page_offices">
                    <div class="container">
                        <div class="row objects-list-wrapper"><h2 class="text-uppercase">Our offices</h2>

                            <div class="object-item  col-xs-12 col-sm-6">
                                <div class="object-inner-wrapper">
                                    <div class="object-thumbnail">
                                        <div class="object-thumbnail-holder">
                                            <img class="img-responsive" src="images/badshahi_masjid.jpg">
                                        </div>
                                    </div>
                                    <div class="object-info-holder">
                                        <div class="info-address"><span>Head office:</span></div>
                                        <h3 class="info-title"><?php echo $_DATA['hname']; ?></h3>

                                        <p class="info-details"><?php echo $_DATA['haddress']; ?></p>
                                        <div class="contacts_holder">
                                            <ul>
                                                <li><a href="tel:<?php echo $_DATA['hcell']; ?>">Mobile No: <?php echo $_DATA['hcell']; ?> </a></li>
                                                <li><a href="tel:<?php echo $_DATA['hlandline']; ?>">Phone No: <?php echo $_DATA['hlandline']; ?></a></li>
                                                <li><a href="mailto:<?php echo $_DATA['hemail']; ?>"><?php echo $_DATA['hemail']; ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="object-item  col-xs-12 col-sm-6">
                                <div class="object-inner-wrapper">
                                    <div class="object-thumbnail">
                                        <div class="object-thumbnail-holder">
                                            <img class="img-responsive" src="images/tomb_Quaid-i-Azam.jpg">
                                        </div>
                                    </div>
                                    <div class="object-info-holder">
                                        <div class="info-address"><span>Site Office:</span></div>
                                        <h3 class="info-title"><?php echo $_DATA['sname']; ?> </h3>

                                        <p class="info-details"><?php echo $_DATA['saddress']; ?></p>
                                        <div class="contacts_holder">
                                            <ul>
                                                <li><a href="tel:<?php echo $_DATA['scell']; ?>">Mobile No: <?php echo $_DATA['scell']; ?> </a></li>
                                                <li><a href="tel:<?php echo $_DATA['slandline']; ?>">Phone No: <?php echo $_DATA['slandline']; ?></a></li>
                                                <li><a href="mailto:<?php echo $_DATA['semail']; ?>"><?php echo $_DATA['semail']; ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
