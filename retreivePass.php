<!DOCTYPE html>
<html lang="en">
<?php 
include_once('head.php');
include_once('navBar.php');
?>
<body>
    <form action="index.php" method="post" >
        <div class="form-group">
            <label class="alert alert-danger" >Ingresa tu Email para recuperar la contraseña</label>
            <input type="text" name="retreiveEmail">
            <input class="btn btn-success"type="submit">
            <input class="btn btn-secodnary"type="reset">
        </div>
    </form>
</body>
</html>