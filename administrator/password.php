<?php
include_once '../classes/realestate.php';
if (!isset($_SESSION['login']) && $_SESSION['login'] != 'login') {
    header("Location:../index.php");
}

//echo session_status();
$obj = new realestate();

if (isset($_POST['submit'])) {
    if ($_POST['password'] == $_POST['cpassword'] && !empty($_POST['cpassword']) && !empty($_POST['password'])) {
        //$param = array('password' => $_POST['password'], 'token' => 'update');
        $result = $obj->change_pass($_POST['password']);
    } else {
        $error = true;
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
        <header>
            <?php include 'header.php'; ?>
        </header>
        <section class="section-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="login-form">

                            <div class="form">
                                <form class="form-horizontal" id="change-password" action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <div class="row">
                                            <label for="password" class="col-sm-5 control-label">New Password</label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="name" name="password" <?php //echo $name;                             ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="cpassword" class="col-sm-5 control-label">Confirm Password</label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="cpassword" name="cpassword" <?php //echo $name;                             ?>>
                                                <div class="msg">
                                                    <?php
                                                    if (isset($error)) {
                                                        echo '<h5 class="text-danger ">Both password do not same.</h5>';
                                                    } elseif (isset($result) && $result == TRUE) {
                                                        echo '<h5 class="text-success">Password updated</h5>';
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group pull-right">
                                        <button value="submit" class="btn btn-primary" name="submit" form="change-password"> submit</button>
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
