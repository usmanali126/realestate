<?php
include_once '../classes/realestate.php';
//echo session_status();
if (!isset($_SESSION['login']) && $_SESSION['login'] != 'login') {
    header("Location:../index.php");
}

$obj = new realestate();
//echo $_SESSION['post_id'];
if (isset($_POST['submit'])) {
//print_r($_POST);
//exit();
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $_Error[$key] = $value;
            $error = TRUE;
        } else {
//            if($_POST[$key]!='submit'){
              $_DATA[$key] = $value;  
//            }
            
        }
    }
    if (!isset($error)) {
//             print_r($_DATA);
//             exit();
        $obj = new realestate();
        $result = $obj->contactus($_DATA);
        while ($row = mysqli_fetch_array($result)) {
//        print_r($row);
//        exit();
        foreach ($row as $key => $value) {
            $_DATA[$key] = $value;
        }
    }
    }

    //print_r($_DATA);
    //echo implode(',' ,$_DATA['image']);
}else{
    
    $param['submit']='fresh';
    $get_data = $obj->contactus($param);
    while ($row = mysqli_fetch_array($get_data)) {
        $_DATA[$row['name']]=$row['value'];
    } 
}
//print_r($_DATA);
//exit();


/* defult variable to set in input */


if ((!empty($_DATA['hname'])) || isset($_DATA['hname'])) {
    $hname = 'value="' . $_DATA['hname'] . '"';
} else {
    $hname = 'placeholder="Head Office name"';
}
if ((!empty($_DATA['haddress'])) || isset($_DATA['haddress'])) {
    $haddress = 'value="' . $_DATA['haddress'] . '"';
} else {
    $haddress = 'placeholder="Head Office address"';
}

if ((!empty($_DATA['hlandline'])) || isset($_DATA['hlandline'])) {
    $hlandline = 'value="' . $_DATA['hlandline'] . '"';
} else {
    $hlandline = 'placeholder="Head Office Landline Number"';
}
if ((!empty($_DATA['hcell'])) || isset($_DATA['hcell'])) {
    $hcell = 'value="' . $_DATA['hcell'] . '"';
} else {
    $hcell = 'placeholder="Head Office cell Number"';
}
if ((!empty($_DATA['hemail'])) || isset($_DATA['hemail'])) {
    $hemail = 'value="' . $_DATA['hemail'] . '"';
} else {
    $hemail = 'placeholder="Head Office email"';
}

//site office

if ((!empty($_DATA['sname'])) || isset($_DATA['sname'])) {
    $sname = 'value="' . $_DATA['sname'] . '"';
} else {
    $sname = 'placeholder="Site Office name"';
}
if ((!empty($_DATA['saddress'])) || isset($_DATA['saddress'])) {
    $saddress = 'value="' . $_DATA['saddress'] . '"';
} else {
    $saddress = 'placeholder="Site Office address"';
}

if ((!empty($_DATA['slandline'])) || isset($_DATA['slandline'])) {
    $slandline = 'value="' . $_DATA['slandline'] . '"';
} else {
    $slandline = 'placeholder="Site Office Landline Number"';
}
if ((!empty($_DATA['scell'])) || isset($_DATA['scell'])) {
    $scell = 'value="' . $_DATA['scell'] . '"';
} else {
    $scell = 'placeholder="Site Office cell Number"';
}
if ((!empty($_DATA['semail'])) || isset($_DATA['semail'])) {
    $semail = 'value="' . $_DATA['semail'] . '"';
} else {
    $semail = 'placeholder="Site Office email"';
}

//Social Information

if ((!empty($_DATA['facebook'])) || isset($_DATA['facebook'])) {
    $facebook = 'value="' . $_DATA['facebook'] . '"';
} else {
    $facebook = 'placeholder="Facebook Link"';
}
if ((!empty($_DATA['twitter'])) || isset($_DATA['twitter'])) {
    $twitter = 'value="' . $_DATA['twitter'] . '"';
} else {
    $twitter = 'placeholder="Twitter Link"';
}
if ((!empty($_DATA['linkedin'])) || isset($_DATA['linkedin'])) {
    $linkedin = 'value="' . $_DATA['linkedin'] . '"';
} else {
    $linkedin = 'placeholder="Linkedin Link"';
}
if ((!empty($_DATA['gplus'])) || isset($_DATA['gplus'])) {
    $gplus = 'value="' . $_DATA['gplus'] . '"';
} else {
    $gplus = 'placeholder="Google Plus Link"';
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
        <?php include 'head.php'; ?>
    </head>
    <body>
        <header>
            <?php include 'header.php'; ?>
        </header>
        <section class="section-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <?php
                        
                        if (isset($error)) {
                            echo '<h5 class="text-danger">Fill the empty fileds first.</h5>';
                        } elseif (isset($result) && $result == TRUE) {
                            echo '<h5 class="text-danger">Record Added</h5>';
                        }
                        ?>
                    </div>


                    <div class="form">
                        <form class="form-horizontal" id="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-sm-12 col-md-6">
                                <fieldset><legend>Head Offices Information</legend>
                                    <div class="form-group">
                                        <label for="hname" class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="hname" name="hname" <?php
                                            if (isset($hname)) {
                                                echo $hname;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="haddress" class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="haddress" name="haddress" <?php
                                            if (isset($haddress)) {
                                                echo $haddress;
                                            }
                                            ?>>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="hlandline" class="col-sm-3 control-label">Landline Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="hlandline" name="hlandline" <?php
                                            if (isset($hlandline)) {
                                                echo $hlandline;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hcell" class="col-sm-3 control-label">Cell Numbers</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="hcell" name="hcell" <?php
                                            if (isset($hcell)) {
                                                echo $hcell;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hemail" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="hemail" name="hemail" <?php
                                            if (isset($hemail)) {
                                                echo $hemail;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset><legend>Site Information</legend>
                                    <div class="form-group">
                                        <label for="sname" class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="sname" name="sname" <?php
                                            if (isset($sname)) {
                                                echo $sname;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="saddress" class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="saddress" name="saddress" <?php
                                            if (isset($saddress)) {
                                                echo $saddress;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="slandline" class="col-sm-3 control-label">Landline Nubmer</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="slandline" name="slandline" <?php
                                            if (isset($slandline)) {
                                                echo $slandline;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="scell" class="col-sm-3 control-label">Cell Nubmer</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="scell" name="scell" <?php
                                            if (isset($scell)) {
                                                echo $scell;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="semail" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="semail" name="semail" <?php
                                            if (isset($semail)) {
                                                echo $semail;
                                            }
                                            ?>>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>
                            <div class="col-sm-12 col-md-6">

                                <fieldset>
                                    <legend>Social Information</legend>
                                    <div class="form-group">
                                        <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="facebook" name="facebook" <?php
                                            if (isset($facebook)) {
                                                echo $facebook;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter" class="col-sm-3 control-label">Twitter</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="twitter" name="twitter" <?php
                                            if (isset($twitter)) {
                                                echo $twitter;
                                            }
                                            ?>>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin" class="col-sm-3 control-label">Linkedin</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="linkedin" name="linkedin" <?php
                                            if (isset($linkedin)) {
                                                echo $linkedin;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gplus" class="col-sm-3 control-label">Google Plus</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="gplus" name="gplus" <?php
                                            if (isset($gplus)) {
                                                echo $gplus;
                                            }
                                            ?>>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group pull-right">
                                    <button value="submit" class="btn btn-primary" name="submit" form="form"> submit</button>
                                </div>

                            </div>
                        </form> 

                    </div>

                </div>
            </div>
        </section>

        <footer>
            <?php include 'footer.php'; ?>
        </footer>
    </body>
</html>
