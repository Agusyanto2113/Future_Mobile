<?php
    //include constants.php for SITEURL
    include('../database/DBController.php'); 
    //1. Destroy Session 
    session_destroy(); //unsets $_SESSIONS['user']

    //2. Redirect to the Login Page
    header('location:'.SITEURL.'admin/login.php');

?>