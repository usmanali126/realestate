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
        $conn=  mysqli_connect('localhost', 'root', '', 'realestate');
        if($conn==TRUE){
            return $conn;
        }else{
            return die('Connectin not astablish with database');
        }
    }
    
    function login($param) {
        $link=  $this->connection();
    }
    
    function store_data($param) {
        $link=  $this->connection();
        $query="INSERT INTO `post` (`id`, `post_id`, `name`, `about`, `category`, `city`, `rooms`, `area`, `price`, `location`, `parking`, `fimage`, `title`, `keywords`, `description`) VALUES (NULL,".$param['post_id'].",".$param['name'].",".$param['about'].",".$param['category'].",".$param['city'].",".$param['rooms'].",".$param['area'].",".$param['price'].",".$param['location'].",".$param['parking'].",".$param['fimage'].",".$param['title'].",".$param['keywords'].",".$param['description'].") ON DUPLICATE KEY UPDATE `post_id`=".$param['post_id'].",`name`=".$param['name'].",`about`=".$param['about'].",`category`=".$param['category'].",`city`=".$param['city'].",`rooms`=".$param['rooms'].",`area`=".$param['area'].",`price`=".$param['price'].",`location`=".$param['location'].",`parking`=".$param['parking'].",`fimage`=".$param['fimage'].",`title`=".$param['title'].",`keywords`=".$param['keywords'].",`description`=".$param['description'].",`date`=".$param['date']." ";
         //$q='INSERT INTO `events`(ID, EventID, Name, ParentCategoryID, ChildCategoryID, GrandchildCategoryID, CountryID, VenueID, VenueConfigurationID, Venue, StateProvinceID, StateProvince, City, Clicks, Date, DisplayDate, IsWomensEvent, MapURL, InteractiveMapURL) VALUES (NULL, ' . $row->ID . ', "' . mysqli_real_escape_string($link, $row->Name) . '", ' . $row->ParentCategoryID . ', ' . $row->ChildCategoryID . ', ' . $row->GrandchildCategoryID . ', ' . $row->CountryID . ', ' . $row->VenueID . ', ' . $row->VenueConfigurationID . ', "' . mysqli_real_escape_string($link, $row->Venue) . '", ' . $row->StateProvinceID . ', "' . mysqli_real_escape_string($link, $row->StateProvince) . '", "' . mysqli_real_escape_string($link, $row->City) . '", ' . $row->Clicks . ', "' . date("Y-m-d H:i:s", strtotime($row->Date)) . '", "' . $row->DisplayDate . '", "' . $row->IsWomensEvent . '", "' . mysqli_real_escape_string($link, $row->MapURL) . '", "' . mysqli_real_escape_string($link, $row->InteractiveMapURL) . '") ON DUPLICATE KEY UPDATE  Name="' . mysqli_real_escape_string($link, $row->Name) . '", VenueID=' . $row->VenueID . ', VenueConfigurationID=' . $row->VenueConfigurationID . ', Venue="' . mysqli_real_escape_string($link, $row->Venue) . '", Clicks=' . $row->Clicks . ', Date="' . date("Y-m-d H:i:s", strtotime($row->Date)) . '", DisplayDate="' . $row->DisplayDate . '", MapURL="' . mysqli_real_escape_string($link, $row->MapURL) . '", InteractiveMapURL="' . mysqli_real_escape_string($link, $row->InteractiveMapURL) . '"';
        $result=  mysqli_query($link, $query) or die(mysqli_error($link));
        if($result== TRUE){
            if(isset($pram['images'])){
               //$query="INSERT INTO `images`(`id`, `post_id`, `name`) VALUES (NULL,[value-2],[value-3])"; 
            }
            
            
        }
 
    }
    
    function get_post($param) {
        $link=  $this->connection();
        $query="SELECT * FROM post WHERE `post_id`='".$param['post_id']."'";
        $result=  mysqli_query($link, $query) or die(mysqli_error($link));
        return $result;
    }
}
