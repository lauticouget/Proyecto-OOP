<!DOCTYPE html>
<html lang="en">
<?php
include_once('functions.php');
include_once('head.php');
?>
<body>
    <?php 
    include_once('navBar.php');
    ?>
    <div class="container">
        <img src="images/Muestra.logo-puntoVet-original.jpg" alt="logo" class="hero-image">
          
        <form style="margin-top:20px;" action="imprimir.php" method="post">
            <fieldset class="form-group" style = "background-color: white;" >
                <h2 class="h2form"> Formulario de Contacto</h2>

                <div class="form-row">
                    <div class="col">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre">
                    </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="nombre">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="telefono">Tel de Contacto:</label>
                    <input type="text" placeholder="011-XXXX-XXXX"name="email">
                    </div>
                </div>
                 <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="telefono2">Tel Celular:</label>
                    <input type="text" placeholder="15-XXXX-XXXX"name="email">
                    </div>
                </div>
                <br>
                <fieldset  class="form-group">
                     <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Empresa Celular:</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                    <input type="radio" name="Claro[]" value="masculino"> Claro
                    <input type="radio" name="Personal[]" value="femenino"> Personal
                    <input type="radio" name="Movistar[]" value="masculino"> Movistar
                    <input type="radio" name="Otras[]" value="femenino"> Otras
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" placeholder="name@example.com" name="email">
                 </div>
                 <br>
                <div class="form-group row">
                    <div class="col-sm-2">Informacion Sobre :</div>
                        <div class="col-sm-10">
                            <div class="form-check">
                    <input type="checkbox" name="info[]" value="ClinicaVeterinaria"> Clinica Veterinaria
                    <br>
                    <input type="checkbox" name="info[]" value="terapias"> Terapias Alternativas de Veterinarias
                    <br>
                    <input type="checkbox" name="info[]" value="productos"> Productos para su Mascota
                    <br>
                    <input type="checkbox" name="info[]" value="servicios"> Servicios de Baño y Peluqueria
                            </div>
                        </div>
                    </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mensaje</label>
            <textarea class="form-control" id="Mensaje de Contacto" rows="4"></textarea>
            </div>
            <br>
        <p> Horario de Contacto </p>
        <select name="HorariodeContacto">
        <option value="1"> 8 a 12 hs </option>
        <option value="2"> 12 a 18 Hs  </option>
        <option value="3"> 18 a 24 Hs </option>
        <br>
        </select>
        <input class="btn btn-primary" type="submit">
    </form>
    </div>

</div>
</body>
</html>