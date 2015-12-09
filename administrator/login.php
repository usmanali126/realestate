<?php
include_once '../classes/realestate.php';
if (!isset($_SESSION['secour']) && $_SESSION['secour'] != 'secour') {
    header("Location:../index.php");
}

//echo session_status();
$obj = new realestate();

if (isset($_GET['logout'])) {
    $obj->logout();
}


if (isset($_POST['submit'])) {
    if (isset($_GET['forget'])) {
        $param = array('user_name' => $_POST['name'], 'user_email' => $_POST['email']);
        $result = $obj->pass_update($param);
        if($result==TRUE){
            $forgetmsg='Your new password sent on your Reg. email';
        }
    } else {
        $param = array('user_name' => $_POST['name'], 'user_password' => $_POST['password']);
        $result = $obj->login($param);
    }
}
//echo $_SESSION['post_id'];
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
        <?php include 'head.php'; ?>
    </head>
    <body>
        <section class="section-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="login-form">
                            <div class="msg">
                                <?php
                                if ((isset($fimage) && $fimage == TRUE)) {
                                    echo '<h5 class="text-danger">Featured Image must be selected</h5>';
                                }
                                if (isset($error)) {
                                    echo '<h5 class="text-danger">Fill the empty fileds first.</h5>';
                                } elseif (isset($result) && $result == TRUE) {
                                    echo '<h5 class="text-danger">Record Added</h5>';
                                }
                                ?>

                            </div>
                            <div class="form">
                                <form class="form-horizontal" id="login" action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <div class="row">
                                            <label for="name" class="col-sm-5 control-label">User Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="name" name="name" <?php //echo $name;             ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php if (!isset($_GET['forget'])) { ?>
                                            <div class="row">
                                                <label for="password" class="col-sm-5 control-label">User Password</label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control" id="password" name="password" <?php //echo $name;             ?>>
                                                    <div class="forget">
                                                        <a class="" href="login.php?forget=true">Forget Password</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="row">
                                                <label for="email" class="col-sm-5 control-label">User Registered Email</label>
                                                <div class="col-sm-7">
                                                    <input type="email" class="form-control" id="email" name="email" <?php //echo $name;             ?>>
                                                    <div class="forget">
                                                        <a class="" href="login.php">Back to Login</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group pull-right">
                                        <button value="submit" class="btn btn-primary" name="submit" form="login"> submit</button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <?php include 'footer.php'; ?>
        </footer>
        <script></script>
    </body>
</html>
