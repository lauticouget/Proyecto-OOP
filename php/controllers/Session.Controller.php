<?php

// SACA DEL LOGIN AL USUARIO YA LOGEADO

class SessionController

{
    public function SessionControl()
    {
        if(isset($_SESSION['username'])){
            header('location: index.php');
        }
            
    }
}
$SessionController= new SessionController;
$SessionController->SessionControl();