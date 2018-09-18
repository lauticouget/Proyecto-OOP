<?php
class RegisterValidator
{
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

}
