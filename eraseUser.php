<?php 
include_once('functions.php');



if($_POST)
    {
       
        if($_SESSION['username'] != (trim($_POST['eraseUser'])))
            {
                eraseUser($_POST['eraseUser']);   
                header('location: admin.php');
            }
        else
            {
                header('location: admin.php');
            }
        
    }

?>