<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <p>
                <?php echo $_DATA['hname']; ?>
            </p>
            <div class="contact-info">
                <span><?php echo $_DATA['hemail']; ?></span>
                <span><?php echo $_DATA['hcell']; ?></span>
                <span><?php echo $_DATA['hlandline']; ?></span>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <p>
                Reg No.
            </p>
            <div class="contact-info">
                <span><a href="#">Sitemap</a></span>
                <span><a href="contact.php">Contact information</a></span>
                <span><a href="privacy.php">Privacy Policy</a></span>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
<!--            <p>
               Legal protection 
            </p>-->
            <div class="social-icon">
                <a href="<?php echo $_DATA['twitter']; ?>"><span class="socicon-twitter"></span></a>
                <a href="<?php echo $_DATA['facebook']; ?>"><span class="socicon-facebook"></span></a>
                <a href="<?php echo $_DATA['linkedin']; ?>"><span class="socicon-linkedin"></span></a>
                <a href="<?php echo $_DATA['gplus']; ?>"><span class="socicon-googleplus"></span></a>
            </div>
        </div>
    </div>
    
</div>
<script src="inc/js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="inc/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="inc/js/bootstrap.js" type="text/javascript"></script>
<script src="inc/js/custom.js" type="text/javascript"></script>
<script src="inc/js/cookies.js" type="text/javascript"></script>
