<?php 
include_once('functions.php');


?>
<!DOCTYPE html>
<html lang="en">

<body class="container-fluid">


    <?php
    include('head.php');
    include_once('navBar.php');

    ?>
    
    <div class="container-block">
    
    <span class="alert alert-danger"><?php  echo giveSession();     ?></span>
    </div>
    
    
    <img class="img-fluid hero-image" src="images/Muestra.logo-puntoVet-original.jpg" alt="logo" class="hero-image">
    <nav id="nav">
    
    <?php 
  
    if ($_POST)
    {
        if ($_POST['retreiveEmail'])
        {
            ?>  <div >
                <span class="mx-auto alert alert-danger">Hemos enviado la recuperacion de contraseña a: 
                <?php
                    echo $_POST['retreiveEmail'];
                    ?>
                </span>
                </div>
            <?php 
        }
    }
    ?>
    
    </nav>
    <div class="container-fluid text-center"id="hero">
        <img class=" img-fluid" src="images/hero.jpg">
    </div>
    
    
    
</body>
</html>