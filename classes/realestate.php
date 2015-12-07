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
    $result=unlink('../upload/'.$_POST['image_d']);
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
    if ($result==TRUE) {
        echo $result;
    } 
//    exit;
}


class realestate {

    function connection() {
        $conn = mysqli_connect('localhost', 'root', '', 'realestate');
        if ($conn == TRUE) {
            return $conn;
        } else {
            return die('Connectin not astablish with database');
        }
    }

    function login($param) {
        $link = $this->connection();
    }

    function store_data($param) {
        $link = $this->connection();
        if(isset($param['edit'])){
            $param['fimage']=$param['basename'];
//            exit($param['fimage']);
        }else{
         $param['fimage'] = $this->image_name($param['basename']);   
        }
        
        //$param['images']=$_FILES["images"];
//        print_r(mysqli_real_escape_string($link, $param['location']));
//        exit();
        
        $query = "INSERT INTO `post` (`id`, `post_id`, `name`, `about`, `category`, `city`, `rooms`, `area`, `price`, `location`, `parking`, `fimage`, `title`, `keywords`, `description`) VALUES (NULL,'" . $param['post_id'] . "','" . $param['name'] . "','" . mysqli_real_escape_string($link, $param['about']) . "','" . $param['category'] . "','" . $param['city'] . "','" . $param['rooms'] . "','" . $param['area'] . "','" . $param['price'] . "','" . mysqli_real_escape_string($link, $param['location']). "','" . $param['parking'] . "','" . $param['fimage'] . "','" . $param['title'] . "','" . $param['keywords'] . "','" . $param['description'] . "') ON DUPLICATE KEY UPDATE `post_id`='" . $param['post_id'] . "',`name`='" . $param['name'] . "',`about`='" . mysqli_real_escape_string($link, $param['about']) . "',`category`='" . $param['category'] . "',`city`='" . $param['city'] . "',`rooms`='" . $param['rooms'] . "',`area`='" . $param['area'] . "',`price`='" . $param['price'] . "',`location`='" . mysqli_real_escape_string($link, $param['location']) . "',`parking`='" . $param['parking'] . "',`fimage`='" . $param['fimage'] . "',`title`='" . $param['title'] . "',`keywords`='" . $param['keywords'] . "',`description`='" . $param['description'] . "' ";
        //$q='INSERT INTO `events`(ID, EventID, Name, ParentCategoryID, ChildCategoryID, GrandchildCategoryID, CountryID, VenueID, VenueConfigurationID, Venue, StateProvinceID, StateProvince, City, Clicks, Date, DisplayDate, IsWomensEvent, MapURL, InteractiveMapURL) VALUES (NULL, ' . $row->ID . ', "' . mysqli_real_escape_string($link, $row->Name) . '", ' . $row->ParentCategoryID . ', ' . $row->ChildCategoryID . ', ' . $row->GrandchildCategoryID . ', ' . $row->CountryID . ', ' . $row->VenueID . ', ' . $row->VenueConfigurationID . ', "' . mysqli_real_escape_string($link, $row->Venue) . '", ' . $row->StateProvinceID . ', "' . mysqli_real_escape_string($link, $row->StateProvince) . '", "' . mysqli_real_escape_string($link, $row->City) . '", ' . $row->Clicks . ', "' . date("Y-m-d H:i:s", strtotime($row->Date)) . '", "' . $row->DisplayDate . '", "' . $row->IsWomensEvent . '", "' . mysqli_real_escape_string($link, $row->MapURL) . '", "' . mysqli_real_escape_string($link, $row->InteractiveMapURL) . '") ON DUPLICATE KEY UPDATE  Name="' . mysqli_real_escape_string($link, $row->Name) . '", VenueID=' . $row->VenueID . ', VenueConfigurationID=' . $row->VenueConfigurationID . ', Venue="' . mysqli_real_escape_string($link, $row->Venue) . '", Clicks=' . $row->Clicks . ', Date="' . date("Y-m-d H:i:s", strtotime($row->Date)) . '", DisplayDate="' . $row->DisplayDate . '", MapURL="' . mysqli_real_escape_string($link, $row->MapURL) . '", InteractiveMapURL="' . mysqli_real_escape_string($link, $row->InteractiveMapURL) . '"';
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            $this->upload_image($param['tmpname'], $param['fimage']);
            if (isset($param['images']) && $param['images_empty']=='no') {
                $i=0;
                foreach ($param['images']["name"] as $value) {
                    $imageName = $this->image_name($value);
                    $query = "INSERT INTO `images`(`id`, `post_id`, `name`) VALUES (NULL,'" . $param['post_id'] . "','$imageName')";
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                    if ($result == TRUE) {
                        $this->upload_image($param['images']["tmp_name"][$i], $imageName);
                        $i++;
                    }
                }
            }
            $_SESSION['post_id']=$param['post_id'];
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
    
    function get_data() {
        $link=$this->connection();
        $query="SELECT * FROM post";
        $result=  mysqli_query($link, $query);
        return $result;
    }

    function get_images($param){
        $link=$this->connection();
        $query="SELECT * FROM images WHERE `post_id`='" . $param['post_id'] . "'";
        $result=  mysqli_query($link, $query);
        return $result;
    }
    
    function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    function image_name($basename) {
        $formate = 'dmYHis';
        date_default_timezone_set('Asia/Karachi');
        $timestemp = date($formate, time());
        $ImgName = $timestemp . $str = $this->rand_string(5) . $basename;
        return $ImgName;
    }

    function upload_image($tmpname, $ImgName) {
        $target_dir = "../upload/";
        $target_file = $target_dir . $ImgName;
        move_uploaded_file($tmpname, $target_file);
    }
    
    function delete_fimage($param) {
        $link=  $this->connection();
        $query="DELETE FROM `images` WHERE `name`='".$param."'";
        $result=  mysqli_query($link, $query) or die(mysqli_error($link));
        unlink('../upload/'.$_POST['d_name']);
        return $result;
        
    }

}