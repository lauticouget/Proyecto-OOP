<?php 
include_once('loader.php');



if($_POST)
    { 
        if($_SESSION['username'] != (trim($_POST['eraseUser']))){
                $jsonManager->eraseUser($_POST['eraseUser']);   
                header('location: admin.php');
            }else
            {
                header('location: admin.php');
            } 
    }





?>