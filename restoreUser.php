<?php 
include_once('loader.php');



if($_POST)
    {
        $jsonManager->restoreUser($_POST['restoreUser']);
        header('location: admin.php');
    }

?>