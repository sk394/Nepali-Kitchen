<?php 
    //Include constants.php for SITEURL
    include('../config/connection.php');
    //1. Destory the Session
    session_destroy(); 

    //2. REdirect to Login Page
    header('location:'.SITEURL.'admin/login.php');

?>