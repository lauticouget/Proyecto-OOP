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
        $proyectPath= dirname(__FILE__); 
        $proyectPath=dirname($proyectPath);
        
        
        
        /* Cambiamos el directorio por la Base de Imagenes */
        $profilePath=$proyectPath . "/images/perfiles/";
        /* Le agregamos la concatenacion de nombre y extensión de cada foto de perfil */
        $profilePath=$profilePath . "perfil" . $id ;

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

                $profilePath=$profilePath . "." . $ext;
                /* Movemos el archivo desde el espacio temporal (Server) A la base de datos (Renombrandolo con $dbPath); */
                move_uploaded_file($serverPath, $profilePath);
                    

                            /* SI NO SUBEN FOTO */            
            }
            
            

        if($_FILES['avatar']['name'] == "" ) {
            $parentDir= dirname(__FILE__); 
            $parentDir=dirname($parentDir);
            
            $dirH=$parentDir."\images\perfilHombre.jpg";
            
            $dirM=$parentDir."\images\perfilMujer.jpg";
            
            
            $profilePath=$profilePath . $defaultExt;
        
            

            if($title =="Sr")
                {                    
                    copy($dirH, $profilePath);
                }
            elseif($title =='Sra')
                {
                    copy($dirM, $profilePath);
                }
        }
        
        return $errores;
            
    }
    public function saveProductImage()
    {


        $errores=[];
        $defaultExt=".jpg";

        /* Capturamos el directorio del proyecto. */
        $proyectPath= dirname(__FILE__); 
        $proyectPath=dirname($proyectPath);
        
        
        
        /* Cambiamos el directorio por la Base de Imagenes */
        $productPath=$proyectPath . "/images/products/";
        /* Le agregamos la concatenacion de nombre y extensión de cada foto de perfil */
        if ($_FILES['image']['error'] == UPLOAD_ERR_OK)
            {   /* Si el archivo se subió correctamente extraemos "imagen.pjg" a una variable */
                $nombre=$_FILES['image']['name'];                
                /* extraemos la extension del nombre */
                $ext=pathinfo($nombre , PATHINFO_EXTENSION);

                /* Capturamos la localización completa de la imagen en el servidor */
                $serverPath=$_FILES['image']['tmp_name'];


                if($ext != "jpeg" && $ext != "jpg" && $ext != "png")
                    {/* Si la imagen no es del tipo correcto devolvemos error */
                        $errores['image']="Debes subir tu imagen en JPG, PNG o JPEG.";
                        return $errores;
                    }
                
                $productPath=$productPath . $_POST['name'] . "." . $ext;
                /* Movemos el archivo desde el espacio temporal (Server) A la base de datos (Renombrandolo con $productPath); */
                move_uploaded_file($serverPath, $productPath);
                    

                            /* SI NO SUBEN FOTO */            
            }
        
        if($_FILES['image']['name'] == "" ) { 
            $dirGenericProduct=$proyectPath."\images\genericProduct.png";
            $productPath=$productPath . $_POST['name'] . $defaultExt;    
            copy($dirGenericProduct, $productPath);      
        }
        return $errores;  
    }
    public function ImgExt()
    {
        $nombre=$_FILES['image']['name'];                
        $ext=pathinfo($nombre , PATHINFO_EXTENSION);
        return $ext;
    }

}

$validator= new Validator;