<?php
require 'loader.php';


if($_POST)
{
  $foundUser = $jsonManager->findUser($_POST);
 
  if ($foundUser != null)
  {
    $checkedPassword=$validator->checkPassword($_POST,$foundUser);
    if($checkedPassword) 
      {        
        $sessionManager->login($foundUser);
        
        if($sessionManager->loginController())
          {
            if(isset($_POST['userRecord']))
              {
                $sessionManager->userRecord($foundUser);
              }
            header('location: index.php');
          }
      }
      
  }
}
if(isset($_SESSION['username']))
  {
    header('location: index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login pet</title>
</head>

<body  class="container">
    <div class="row mx-auto d-flex">
        <img src="images/Muestra.logo-puntoVet-original.jpg" alt="logo" class="mx-auto logo">
    </div>
    <div class="row d-flex  d-block">
      <a class="boton_inicio"  href="index.php">Ir al inicio</a>
    </div>
    <div class="container form-container">
        <form action="" method="post" name="loginForm " class="  row  mx-auto ">
            <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12 mx-auto text-center">
                <label  class="userypass">Username</label>
            </div>
            <div class="col-xs-4 col-sm-6 col-md-12 col-lg-12 text-center mx-auto">
                <input  class=" userinput " autofocus  type="text" name="username" 
                value="<?= isset($_COOKIE['userRecord']) ? $_COOKIE['userRecord'] : "" ?>">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12 mx-auto text-center">
                <label  class="userypass">password</label>
            </div>
            <div class="col-xs-4 col-sm-6 col-md-12 col-lg-12 text-center mx-auto">
                            <input  class=" userinput " type="password" name="password">
            </div>
            <div class=" form-row form-check mx-auto">
                <input  class="form-check-input"  type="checkbox" name="userRecord">
                <label class="form-check-label">Recordar Usuario</label>
            </div>

            <?php if ($_POST)
                  {
                    if ($foundUser == null || !$checkedPassword )
                      { ?>
                      <div  style="padding: 10px  0px 10px 0px;" class="col-xs-4 col-sm-6 col-md-12 col-lg-12 mx-auto text-center">
                        <span class="alert alert-danger  text-center">
                              Usuario o contraseña Incorrectas.
                        </span>
                      </div>
                        

                      <?php }


                  } ?>
            
            <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12 mx-auto text-center ">
                <button class="userbuttons" type="submit">Login</button>
            </div >
            <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12 mx-auto text-center ">
                    <button class="userbuttons" type="reset">Cancel</button>
                    <a class="btn btn-secondary"id="registrate" style="text-decoration: none; color:black" href="register.php">Registrate</a>
            </div >
            <div style="margin-top: 10px"class="col-xs-4 col-sm-4 col-md-12 col-lg-12 mx-auto text-center ">
                    <a name="retreivePass" class="btn btn-light" id="olvideContra" href="retreivePass.php">Olvidé mi contraseña</a>
                  
            </div >
        </form >
    </div>
    <footer class=" footer pt-4">

            
            <div class="container-fluid text-center text-md-left">
              <div class="row">
                <div class="col-md-6">
                  <h5 class="text-uppercase">No te quedes con Dudas</h5>
                  <p>Somos el 1° Pet Shop Online de Argentina y ofrecemos una experiencia cómoda en las compras para tus mascotas. Podes comprar las 24hs desde tu smart phone o compu. Tenemos la mejor selección de productos que no se consiguen en cualquier pet shop.</p>
                </div>

                <div class="col-md-2 ">
                    <h5 class="text-uppercase">Mi cuenta</h5>
        
                    <ul class="list-unstyled">
                      <li>
                        <a href="#!">Mi cuenta</a>
                      </li>
                      <li>
                        <a href="#!">Preguntas Historial de Pedidos</a>
                      </li>
                      <li>
                        <a href="#!">Mis direcciones</a>
                      </li>
                      <li>
                        <a href="#!">Mis favoritos</a>
                      </li>
                      <li>
                          <a href="#!">Mis Avisos</a>
                      </li>
                    </ul>
        
                  </div>

                  <div class="col-md-2 mb-md-0 mb-3">

                    <h5 class="text-uppercase">comprar</h5>
        
                    <ul class="list-unstyled">
                      <li>
                        <a href="#!">Gatos</a>
                      </li>
                      <li>
                        <a href="#!">Perros</a>
                      </li>
                      <li>
                        <a href="#!">Otas mascotas</a>
                      </li>
                      <li>
                        <a href="#!">Ofertas</a>
                      </li>
                    </ul>
        
                  </div>

                  <div class="col-md-2 mb-md-0 mb-3 ">

                      <h5 class="text-uppercase">comprar</h5>
          
                      <ul class="list-unstyled" >
                        <li>
                          <a  href="#!">Envíos a todo el país</a>
                        </li>
                        <li>
                          <a  href="#!">Cómo comprar</a>
                        </li>
                        <li>
                          <a  href="#!">Mapas del Sitio</a>
                        </li>
                        <li>
                          <a  href="#!">Preguntas Frecuentes</a>
                        </li>
                        <li>
                          <a  href="#!">Contactanos</a>
                        </li>
                        
                      </ul>
                      
                  </div>
                  
        
              </div>
              <!-- Grid row -->
        
            </div>
            <!-- Footer Links -->
        
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2018 Copyright:
              <a href="https://mdbootstrap.com/bootstrap-tutorial/"> PuntoVet.com.ar</a>
            </div>
            <!-- Copyright -->
        
          </footer>
    
    <!-- <footer class=" footer font-small page-footer blue">
        <div class="row mx-auto footer-nav">
            <a href="#" class="col-lg-2 col-md-4 col-xs-12 col-sm-12 text-center mx-auto">Contactanos</a>
            <a href="#" class="col-lg-2 col-md-4 col-xs-12 col-sm-12 text-center mx-auto">Avisos Legales</a>
            <a href="#" class="col-lg-2 col-md-4 col-xs-12 col-sm-12 text-center mx-auto">Empleo</a>
            <a href="#" class="col-lg-2 col-md-4 col-xs-12 col-sm-12 text-center mx-auto">Sobre Nosotros</a>
            <a href="#" class="col-lg-2 col-md-4 col-xs-12 col-sm-12 text-center mx-auto">Envíos</a>
            <a href="#" class="col-lg-2 col-md-4 col-xs-12 col-sm-12 text-center mx-auto">Métodos de Pago</a>
            <a href="#" class="col-lg-2 col-md-4 col-xs-12 col-sm-12 text-center mx-auto">Condiciones de Venta</a>

        </div>


    </footer> -->
    <!-- Footer -->

      <!-- Footer -->       

    
</body>
</html>