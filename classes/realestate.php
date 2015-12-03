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
        $basename=basename($_FILES["fimage"]["name"]);
        $tempname=$_FILES["fimage"]["tmp_name"];
        $ImgName=$this->image_name($basename);
        echo $ImgName;
        //$this->upload_image($param['fimage']);
        //print_r($param);
        exit();
        //print_r($param['images']);
        $link = $this->connection();
        echo $query = "INSERT INTO `post` (`id`, `post_id`, `name`, `about`, `category`, `city`, `rooms`, `area`, `price`, `location`, `parking`, `fimage`, `title`, `keywords`, `description`) VALUES (NULL,'" . $param['post_id'] . "','" . $param['name'] . "','" . $param['about'] . "','" . $param['category'] . "','" . $param['city'] . "','" . $param['rooms'] . "','" . $param['area'] . "','" . $param['price'] . "','" . $param['location'] . "','" . $param['parking'] . "','" . $param['fimage'] . "','" . $param['title'] . "','" . $param['keywords'] . "','" . $param['description'] . "') ON DUPLICATE KEY UPDATE `post_id`='" . $param['post_id'] . "',`name`='" . $param['name'] . "',`about`='" . $param['about'] . "',`category`='" . $param['category'] . "',`city`='" . $param['city'] . "',`rooms`='" . $param['rooms'] . "',`area`='" . $param['area'] . "',`price`='" . $param['price'] . "',`location`='" . $param['location'] . "',`parking`='" . $param['parking'] . "',`fimage`='" . $param['fimage'] . "',`title`='" . $param['title'] . "',`keywords`='" . $param['keywords'] . "',`description`='" . $param['description'] . "' ";
        //$q='INSERT INTO `events`(ID, EventID, Name, ParentCategoryID, ChildCategoryID, GrandchildCategoryID, CountryID, VenueID, VenueConfigurationID, Venue, StateProvinceID, StateProvince, City, Clicks, Date, DisplayDate, IsWomensEvent, MapURL, InteractiveMapURL) VALUES (NULL, ' . $row->ID . ', "' . mysqli_real_escape_string($link, $row->Name) . '", ' . $row->ParentCategoryID . ', ' . $row->ChildCategoryID . ', ' . $row->GrandchildCategoryID . ', ' . $row->CountryID . ', ' . $row->VenueID . ', ' . $row->VenueConfigurationID . ', "' . mysqli_real_escape_string($link, $row->Venue) . '", ' . $row->StateProvinceID . ', "' . mysqli_real_escape_string($link, $row->StateProvince) . '", "' . mysqli_real_escape_string($link, $row->City) . '", ' . $row->Clicks . ', "' . date("Y-m-d H:i:s", strtotime($row->Date)) . '", "' . $row->DisplayDate . '", "' . $row->IsWomensEvent . '", "' . mysqli_real_escape_string($link, $row->MapURL) . '", "' . mysqli_real_escape_string($link, $row->InteractiveMapURL) . '") ON DUPLICATE KEY UPDATE  Name="' . mysqli_real_escape_string($link, $row->Name) . '", VenueID=' . $row->VenueID . ', VenueConfigurationID=' . $row->VenueConfigurationID . ', Venue="' . mysqli_real_escape_string($link, $row->Venue) . '", Clicks=' . $row->Clicks . ', Date="' . date("Y-m-d H:i:s", strtotime($row->Date)) . '", DisplayDate="' . $row->DisplayDate . '", MapURL="' . mysqli_real_escape_string($link, $row->MapURL) . '", InteractiveMapURL="' . mysqli_real_escape_string($link, $row->InteractiveMapURL) . '"';
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($result == TRUE) {
            //$this->upload_image($param['fimage']);
            if (isset($param['images'])) {
                foreach ($param['images'] as $value) {
                   echo $query="INSERT INTO `images`(`id`, `post_id`, `name`) VALUES (NULL,'" . $param['post_id'] . "','$value')"; 
                   $result=  mysqli_query($link, $query) or die(mysqli_error($link));
                   
                   //$this->upload_image($param);
                }
            }
            return $result;
        }
//        exit();
    }

    function get_post($param) {
        $link = $this->connection();
        $query = "SELECT * FROM post WHERE `post_id`='" . $param['post_id'] . "'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        return $result;
    }
    
    function rand_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }
    
    function image_name($basename) {
//        $target_dir = "upload/";
        //$size = $_FILES["img"]["size"];
        $formate = 'dmYHis';
        date_default_timezone_set('Asia/Karachi');
        $timestemp = date($formate, time());
        //$randstr = new realestate();
        $ImgName = $timestemp . $basename;
//        $target_file = $target_dir . $ImgName;
        //printf(move_uploaded_file($_POST['image'], $target_file));
//        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//                        echo 'uploaded';
//                        } else {
//                            echo "Sorry, there was an error uploading your file.";
//                        }
//        exit(); 
        return $ImgName;
        
    }
    
    
    function upload_image($param) {
        $target_dir = "upload/";
        //$size = $_FILES["img"]["size"];
        $formate = 'dmYHis';
        date_default_timezone_set('Asia/Karachi');
        $timestemp = date($formate, time());
        $randstr = new realestate();
        $ImgName = $timestemp . $str = $randstr->rand_string(5) . $param;
        $target_file = $target_dir . $ImgName;
        if (move_uploaded_file($ImgName, $target_file)) {
                        echo 'uploaded';
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
        //exit();
    }

}
