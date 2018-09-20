<?php 
include_once('classes/Json.php');



if($_POST)
    {
        $jsonManager->restoreUser($_POST['restoreUser']);
        header('location: admin.php');
    }

?>