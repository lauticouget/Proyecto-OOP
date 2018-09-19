<?php


class Validator

{
    public function checkPassword($data, $foundUser)
    {
        return password_verify($data['password'], $foundUser['password']);
    }

    public function validate($data)
    {
        $errors=[];

        if($data)
        {
            $name=$data['name'];
            $username= trim($data['username']);
            $email=trim($data['email']);
            $password=$data['password'];
            $cpassword=$data['cpassword'];

            if(!$name)
            {
                $errors['name']='Completar Nombre.';
            }

            if (!$username)
            {
                $errors['username']='completar Nombre de Usuario.';
                
            }elseif(strlen($username)<5){
                    $errors['username']='El nombre de Usuario Debe ser más largo.';
            }

            if(!$email)
            {
                $errors['email']='Completar Email.';
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $errors['email']='El Email es incompatible.';
                }
            }

            if(!$password)
            {
                $errors['password']='Completar contraseña.';
            }elseif(strlen($password)<6){
                $errors['password']='La contraseña Debe ser más larga.';
            }

            if(!isset($errors['password']))
            {
                if($cpassword!=$password)
                {
                    $errors['cpassword']='La Confirmación de contraseña debe ser identica a la contraseña ingresada.';
                }
            }
            return $errors;
             
    }
    public function uploadAvatar($user)
    {
        
        $errores=[];
        $title=$_POST['title'];

        $id=$user['id'];
        $defaultExt=".jpg";

        /* Capturamos el directorio del proyecto. */
        $dbPath= dirname(__FILE__); 

        /* Cambiamos el directorio por la Base de Imagenes */
        $dbPath=$dbPath . "/images/perfiles/";
        /* Le agregamos la concatenacion de nombre y extensión de cada foto de perfil */
        $dbPath=$dbPath . "perfil" . $id ;

        if ($_FILES['avatar']['error'] == UPLOAD_ERR_OK)
            {   /* Si el archivo se subió correctamente extraemos "imagen.pjg" a una variable */
                $nombre=$_FILES['avatar']['name'];
                /* Capturamos la localización completa de la imagen en el servidor */
                $serverPath=$_FILES['avatar']['tmp_name'];
                
                /* extraemos la extension del nombre */
                $ext=pathinfo($nombre , PATHINFO_EXTENSION);


                if($ext != "jpeg" && $ext != "jpg" && $ext != "png")
                    {/* Si la imagen no es del tipo correcto devolvemos error */
                        $errores['avatar']="Débes subir tu imagen en JPG, PNG o JPEG.";
                        return $errores;
                    }

                $dbPath=$dbPath . "." . $ext;
                /* Movemos el archivo desde el espacio temporal (Server) A la base de datos (Renombrandolo con $dbPath); */
                move_uploaded_file($serverPath, $dbPath);
                    

                            /* SI NO SUBEN FOTO */            
            }
            
        if($_FILES['avatar']['name'] == "" )
            {   $dirH="C:/xampp/htdocs/proyecto-integrador/images/perfilHombre.JPEG";
                $dirM="C:/xampp/htdocs/proyecto-integrador/images/perfilMujer.jpg";
            
                $dbPath=$dbPath . $defaultExt;
            
                

                if($title =="Sr")
                    {
                        copy($dirH, $dbPath);
                    }
                elseif($title =='Sra')
                    {
                        copy($dirM, $dbPath);
                    }
            }
        
        return $errores;
            
    }

}

$validator= new Validator;