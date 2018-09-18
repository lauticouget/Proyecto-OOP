<?php 
include_once('functions.php');



if($_POST)
    {
        restoreUser($_POST['restoreUser']);   
        header('location: admin.php');
    }

?>