<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of realestate
 *
 * @author Usman
 */
session_start();

if (isset($_POST['image_d'])) {
    $result = unlink('../upload/' . $_POST['image_d']);
//    $obj = new realestate();
//    $result = $obj->delete_fimage($_POST['image_d']);
//    if ($result==TRUE) {
    echo $result;
//    } 
//    exit;
}

if (isset($_POST['d_name'])) {
//    $result=unlink('../upload/'.$_POST['image_d']);
    $obj = new realestate();
    $result = $obj->delete_fimage($_POST['d_name']);
    if ($result == TRUE) {
        echo $result;
    }
//    exit;
}

class realestate {

    function connection() {
//        $conn = mysqli_connect('localhost', 'reccatec_real', 'admin', 'reccatec_realestate');
        $conn = mysqli_connect('localhost', 'root', '', 'realestate');
        if ($conn == TRUE) {
            return $conn;
        } else {
            return die('Connectin not astablish with database');
        }
    }

    function login($param) {
        if ($param['user_name'] == 'admin' && $param['user_password'] == 'admin') {
            $_SESSION['login'] = 'login';
            $_SESSION['name'] = $data['name'];
            $_SESSION['user_name'] = $data['user_name'];
            $_SESSION['secour'] = NULL;
            header("Location:../administrator");
        } else {
            //      return 'Your password or User name is invalid';
            //}

            $link = $this->connection();
            $query = "SELECT * FROM user WHERE `user_name`='" . $param['user_name'] . "'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_array($result);
                $dbpassword = $data['user_pass'];
                //echo password_hash($param['user_password'], PASSWORD_DEFAULT);
                //echo $password=$param['user_password'];
                /* if (password_verify($param['user_password'], $dbpassword)) { */
                if ($param['user_password'] == $dbpassword) {
                    $_SESSION['login'] = 'login';
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['user_name'] = $data['user_name'];
                    $_SESSION['secour'] = NULL;
                    header("Location:../administrator");
                    //echo'successfull';
                } else {
                    return 'Your password or User name is invalid';
                }
            }
        }
        //exit();
    }

    function change_pass($param) {
        $link = $this->connection();
        $password = $param;
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE `user` SET `user_pass`='$password' WHERE `user_name`='" . $_SESSION['user_name'] . "'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        return $result;
    }

    function pass_update($param) {
        $link = $this->connection();
        $password = $this->rand_string(7);

//        $email = array("email" => $param['user_email'], "name" => $param['user_name'], "pass" => $password);
        $to = $param['user_email'];
        $subject = "Your Password";
        $message = "Hello Dear </br> Your Password is <strong>" . $password . "</strong>";
        $send = $this->send_email($to, $subject, $message);
        if ($send == true) {
            //$password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE `user` SET `user_pass`='$password' WHERE `user_email`='" . $param['user_email'] . "'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            return $result;
            //exit();
        }
    }

    function contactus($param) {
//        print_r($param);
//        exit();
        $link = $this->connection();
        if ($param['submit'] == 'submit') {
            foreach ($param as $key => $value) {
//            echo $value;
//            exit();
                $query = "INSERT INTO `contactus` (`id`, `name`, `value`) VALUES (NULL,'" . $key . "','" . mysqli_real_escape_string($link, $value) . "') ON DUPLICATE KEY UPDATE `name`='" . $key . "',`value`='" . mysqli_real_escape_string($link, $value) . "'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
            }
            if ($result == TRUE) {
                $query = "SELECT * FROM `contactus`";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                return $result;
            }
        } else {
            $query = "SELECT * FROM `contactus`";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            return $result;
        }
    }

    function store_data($param) {
        $link = $this->connection();
        if (isset($param['edit'])) {
            $param['fimage'] = $param['basename'];
//            exit($param['fimage']);
        } else {
            $ImgName = $param['post_id'] . $str = $this->rand_string(5) . $param['basename'];
            $param['fimage'] = $ImgName;
//            $param['fimage'] = $this->image_name($param['basename']);
        }

        //$param['images']=$_FILES["images"];
//        print_r(mysqli_real_escape_string($link, $param['location']));
//        exit();

        $query = "INSERT INTO `post` (`id`, `post_id`, `name`, `about`, `category`, `city`, `rooms`, `area`, `price`, `sim1`, `sim2`, `location`, `address`, `parking`, `fimage`, `title`, `keywords`, `description`) VALUES (NULL,'" . $param['post_id'] . "','" . $param['name'] . "','" . mysqli_real_escape_string($link, $param['about']) . "','" . $param['category'] . "','" . $param['city'] . "','" . $param['rooms'] . "','" . $param['area'] . "','" . $param['price'] . "','" . $param['sim1'] . "','" . $param['sim2'] . "','" . mysqli_real_escape_string($link, $param['location']) . "','" . mysqli_real_escape_string($link, $param['address']) . "','" . $param['parking'] . "','" . $param['fimage'] . "','" . $param['title'] . "','" . $param['keywords'] . "','" . $param['description'] . "') ON DUPLICATE KEY UPDATE `post_id`='" . $param['post_id'] . "',`name`='" . $param['name'] . "',`about`='" . mysqli_real_escape_string($link, $param['about']) . "',`category`='" . $param['category'] . "',`city`='" . $param['city'] . "',`rooms`='" . $param['rooms'] . "',`area`='" . $param['area'] . "',`price`='" . $param['price'] . "',`sim1`='" . $param['sim1'] . "',`sim2`='" . $param['sim2'] . "',`location`='" . mysqli_real_escape_string($link, $param['location']) . "',`address`='" . mysqli_real_escape_string($link, $param['address']) . "',`parking`='" . $param['parking'] . "',`fimage`='" . $param['fimage'] . "',`title`='" . $param['title'] . "',`keywords`='" . $param['keywords'] . "',`description`='" . $param['description'] . "' ";
        //$q='INSERT INTO `events`(ID, EventID, Name, ParentCategoryID, ChildCategoryID, GrandchildCategoryID, CountryID, VenueID, VenueConfigurationID, Venue, StateProvinceID, StateProvince, City, Clicks, Date, DisplayDate, IsWomensEvent, MapURL, InteractiveMapURL) VALUES (NULL, ' . $row->ID . ', "' . mysqli_real_escape_string($link, $row->Name) . '", ' . $row->ParentCategoryID . ', ' . $row->ChildCategoryID . ', ' . $row->GrandchildCategoryID . ', ' . $row->CountryID . ', ' . $row->VenueID . ', ' . $row->VenueConfigurationID . ', "' . mysqli_real_escape_string($link, $row->Venue) . '", ' . $row->StateProvinceID . ', "' . mysqli_real_escape_string($link, $row->StateProvince) . '", "' . mysqli_real_escape_string($link, $row->City) . '", ' . $row->Clicks . ', "' . date("Y-m-d H:i:s", strtotime($row->Date)) . '", "' . $row->DisplayDate . '", "' . $row->IsWomensEvent . '", "' . mysqli_real_escape_string($link, $row->MapURL) . '", "' . mysqli_real_escape_string($link, $row->InteractiveMapURL) . '") ON DUPLICATE KEY UPDATE  Name="' . mysqli_real_escape_string($link, $row->Name) . '", VenueID=' . $row->VenueID . ', VenueConfigurationID=' . $row->VenueConfigurationID . ', Venue="' . mysqli_real_escape_string($link, $row->Venue) . '", Clicks=' . $row->Clicks . ', Date="' . date("Y-m-d H:i:s", strtotime($row->Date)) . '", DisplayDate="' . $row->DisplayDate . '", MapURL="' . mysqli_real_escape_string($link, $row->MapURL) . '", InteractiveMapURL="' . mysqli_real_escape_string($link, $row->InteractiveMapURL) . '"';
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            if (!isset($param['edit'])) {
                $this->upload_image($param['tmpname'], $param['fimage']);
            }

            if (isset($param['images']) && $param['images_empty'] == 'no') {
                $i = 0;
                foreach ($param['images']["name"] as $value) {
//                    echo $ImgName = $param['post_id'] . $str = $this->rand_string(5) . $value;
//                    exit();
                    $imageName = $this->image_name($value, $param['post_id']);
                    $query = "INSERT INTO `images`(`id`, `post_id`, `name`) VALUES (NULL,'" . $param['post_id'] . "','$imageName')";
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                    if ($result == TRUE) {
                        $this->upload_image($param['images']["tmp_name"][$i], $imageName);
                        $i++;
                    }
                }
            }
            $_SESSION['post_id'] = $param['post_id'];
            header("Location:index.php?edit=true");
            //return $result;
        }
//        exit();
    }

    function get_post($param) {
        $link = $this->connection();
        $query = "SELECT * FROM post WHERE `post_id`='" . $param['post_id'] . "'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        return $result;
    }

    function first_load($search) {
        $link = $this->connection();
        if(isset($search['search'])){
            $query = "SELECT * FROM post WHERE name LIKE '%" . $search['search'] . "%' ORDER BY post_id DESC LIMIT 3 ";
        }elseif(isset($search['price-down'])){
            $query = "SELECT * FROM post ORDER BY price LIMIT 3 ";
        }elseif(isset($search['price-up'])){
            $query = "SELECT * FROM post ORDER BY price DESC LIMIT 3 ";
        }elseif(isset($search['category'])){
            $query = "SELECT * FROM post WHERE category LIKE '%" . $search['category'] . "' ORDER BY post_id DESC LIMIT 3 ";
        }

        $result = mysqli_query($link, $query);
        return $result;
    }

    function second_load($id, $search) {
        $link = $this->connection();
        if(isset($search['search'])){
            $query = "SELECT * FROM post WHERE post_id < '$id'  AND name LIKE '%" . $search['search'] . "%' ORDER BY post_id DESC LIMIT 5 ";
        }elseif(isset($search['price-down'])){
          $query = "SELECT * FROM post WHERE price > '" . $search['value'] . "'  ORDER BY price LIMIT 5 ";
//           exit();
        }elseif(isset($search['price-up'])){
            $query = "SELECT * FROM post WHERE price < '" . $search['value'] . "'  ORDER BY price DESC LIMIT 5 ";
//            exit();
        }elseif(isset($search['category'])){
            $query = "SELECT * FROM post WHERE post_id < '$id'  AND category LIKE '%" . $search['category'] . "' ORDER BY post_id DESC LIMIT 5 ";
        }

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        return $result;
    }

    function get_data() {
        $link = $this->connection();
        $query = "SELECT * FROM post";
        $result = mysqli_query($link, $query);
        return $result;
    }

    function get_images($param) {
        $link = $this->connection();
        $query = "SELECT * FROM images WHERE `post_id`='" . $param['post_id'] . "'";
        $result = mysqli_query($link, $query);
        return $result;
    }

    function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    function image_name($basename, $id) {
        $formate = 'dmYHis';
        date_default_timezone_set('Asia/Karachi');
        $timestemp = date($formate, time());
        $ImgName = $id . $str = $this->rand_string(5) . $basename;
        return $ImgName;
    }

    function upload_image($tmpname, $ImgName) {
        $target_dir = "../upload/";
        $target_file = $target_dir . $ImgName;
        move_uploaded_file($tmpname, $target_file);
    }

    function delete_fimage($param) {
        $link = $this->connection();
        $query = "DELETE FROM `images` WHERE `name`='" . $param . "'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        unlink('../upload/' . $_POST['d_name']);
        return $result;
    }

    function delete_post($param) {
        $link = $this->connection();
        $param_id['post_id'] = $param;
        $fimage = $this->get_post($param_id);
        $query = "DELETE FROM `post` WHERE `post_id`='" . $param . "'";
        if (mysqli_query($link, $query)) {
            $fimage = mysqli_fetch_array($fimage);
            unlink('../upload/' . $fimage['fimage']);
            $images = $this->get_images($param_id);
            while ($row = mysqli_fetch_array($images)) {
                $query = "DELETE FROM `images` WHERE `name`='" . $row['name'] . "'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                unlink('../upload/' . $row['name']);
            }
        }

//        return $result;
    }

    function send_email($to, $subject, $message) {
//        $to = $param['email'];
//        $subject = "Your Password";
//        $txt = "Hello Dear </br> Your Password is <strong>" . $param['pass'] . "</strong>";
//        $headers = "From: webmaster@example.com" . "\r\n" .
//                "CC: somebodyelse@example.com";

        if (mail($to, $subject, $message)) {
            return $result = true;
        }
    }

    function logout() {
        session_destroy();
        header("Location:../index.php");
    }

}
