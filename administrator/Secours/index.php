<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$_SESSION['secour']='secour';
$time=  time().'%20%now%20%you%20%are%20%secour%20%please%20%login%20%with%20%your%20%user%20%name%20%and%20%password';
header("Location:../login.php?session=$time");