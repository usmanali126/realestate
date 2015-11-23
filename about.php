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
        <section class="about-section">
            <div class="about_wrap">
                <div class="about_section about_section_grey about_section_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 about-top-col"><h1>The Leading Properties of the World</h1>

                                <p>We are an international company with a special focus on the sale and marketing of high-end residential property</p></div>
                        </div>
                    </div>
                </div>
                <div class="about_section about_section_sell">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 about-image-col">
                                <img src="https://d18mncbmmvtpqd.cloudfront.net/assets/images/elements/sales.svg" class="about_img img-responsive">
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <div class="about_text"><h2>High-end residential property</h2>

                                    <p>There is an ever-rising demand and an acute shortage of quality housing in major cities with developed infrastructure. Discerning buyers are looking for it both for their personal use and as an investment. We have set ourselves an ambitious task to provide them with the carefully chosen selection of properties and a tailor made acquisition services.</p></div>
                                <a href="https://www.leadingproperties.com/add-property/" class="about_section_sell_link">Go to add property page<sup class="sup-free">FREE</sup> </a></div>
                        </div>
                    </div>
                </div>
                <div class="about_section about_section_grey about_section_search">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-sm-push-8 col-xs-12 about-image-col">
                                <img src="https://d18mncbmmvtpqd.cloudfront.net/assets/images/elements/search.svg" class="about_img img-responsive">
                            </div>
                            <div class="col-xs-12 col-sm-8 col-sm-pull-4 col-xs-12 about_text">
                                <h2>Sale and individual property search</h2>

                                <p>We provide sale and marketing services of high-end residential property to owners, developers and estate agencies around the world. We provide private clients with an individual property search and assist them in property transactions.</p></div>
                        </div>
                    </div>
                </div>
                <div class="about_section about_section_investments">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 about-image-col">
                                <img src="https://d18mncbmmvtpqd.cloudfront.net/assets/images/elements/investments.svg" class="about_img">
                            </div>
                            <div class="col-xs-12 col-sm-8 about_text"><h2>Property Investment</h2>

                                <p>We are also involved in development projects in central London and offer our clients a unique possibility to invest with us with returns of around 30% or more. Please contact us for a detailed presentation.</p></div>
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

                        <form method="post" data-remote="true" accept-charset="UTF-8" action="/contact-form" class="contact-form" id="contact-form"><input type="hidden" value="✓" name="utf8">
                            <div class="form-message error-form-message"><p>We need your contact information to answer your question. Please, fill required fields.</p></div>
                            <div class="form-message success-form-message"><p>Thank you, your request was received.</p></div>
                            <div class="form-row">
                                <div class="form-group form-group-name">
                                    <input type="text" id="request_name" name="request[name]" placeholder="Enter your name" class="get_info_name form-control">
                                </div>
                                <div class="form-group form-group-email">
                                    <input type="email" id="request_email" name="request[email]" placeholder="your email" class="get_info_email paired form-control">
                                </div>
                                <div class="form-group form-group-phone">
                                    <input type="tel" id="request_phone" name="request[phone]" placeholder="or your phone" class="get_info_phone paired form-control">
                                </div>
                                <div class="form-group form-group-message">
                                    <textarea id="request_message" name="request[message]" placeholder="your message" class="textarea form-control"></textarea>
                                </div>
                                <input type="hidden" id="request_lang" name="request[lang]" value="en">
                                <input type="hidden" id="request_prop_id" name="request[prop_id]" value="0">
                                <div class="form-inner-row">
                                    <div class="form-group form-group-button">
                                        <input type="submit" id="submit" class="submit" value="Send your request" name="commit">
                                    </div>
                                    <div class="form-group form-group-disclaimer">
                                        <div class="disclaimer-content-wrapper"><i class="glyphicon glyphicon-lock"></i>
                                            <p class="note-text">Your contact details will be used only to provide you with more information about the property.<br>
                                                <a href="https://www.leadingproperties.com/protection-policy-personal-information/">Read more</a> about our Privacy policy
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
