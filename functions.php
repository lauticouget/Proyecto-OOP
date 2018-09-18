<?php
session_start();
function giveSession()
    {
        if(isset($_SESSION['username']))
        {
            return "Loged";
        }else{
            return "Not Loged";
        }
    }


function dd($var)
    {
        echo"<pre>";
        die(var_dump($var));
        echo "</pre>";
    }




function keepValue($userInput)
{
    if(isset($_POST[$userInput]))
    {
        return $_POST[$userInput];
    }
}

function validate($data)
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

function createUser($data)
{
    $user=[
        'name'=> $_POST['name'],
        'username'=> $_POST['username'],
        'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
        'email'=> $_POST['email'],
        'role' => 1
    ];
    $user['id']=generateId();
    return $user;
}
function generateId()
{
    $file= file_get_contents('users.json');

    if($file == ""){
        return 1;
    }

    $users=explode(PHP_EOL , $file);
    array_pop($users);
    $lastUser=$users[count($users)-1];
    $lastUser=json_decode($lastUser, true);
    
    return $lastUser["id"]+1 ;
    
}

function saveUser($user)
{
    $jsonUser=json_encode($user);
    file_put_contents('users.json', $jsonUser . PHP_EOL, FILE_APPEND);
    
}


function eraseUser($data)
    {
        $users=decodeUsers();
        $data=trim($data);
        foreach($users as $user)
            {
                if($user['username'] == $data)
                    {
                        $deletedUser=$user;
                        $jsonDeletedUser=json_encode($user);
                        file_put_contents('deleted.users.json', $jsonDeletedUser . PHP_EOL, FILE_APPEND);
                        unset($user);
                    }    
                if(isset($user))
                    {
                        $jsonUser=json_encode($user);
                        $jsonUsers[]=$jsonUser;
                    }
            }
        if (count($jsonUsers) > 0)
            {
                $fullJson=implode(PHP_EOL, $jsonUsers);
                file_put_contents('users.json', $fullJson . PHP_EOL);
            }else{
                file_put_contents('users.json', "");
            }
        
    }
function restoreUser($data)
    {
        $deletedUsers=decodeDeletedUsers();
        $data=trim($data);
        foreach($deletedUsers as $deletedUser)
            {
                if($deletedUser['username'] == $data)
                    {
                        $user=$deletedUser;
                        $jsonUser=json_encode($user);
                        file_put_contents('users.json', $jsonUser . PHP_EOL, FILE_APPEND);
                        unset($deletedUser);
                    }    

                if(isset($deletedUser))
                    {
                        $jsonDeletedUser=json_encode($deletedUser);
                        $jsonDeletedUsers[]=$jsonDeletedUser;
                        
                    }
            }
        if(count($jsonDeletedUsers) > 0)
        {
            $fullDeletedJson=implode(PHP_EOL, $jsonDeletedUsers);
            file_put_contents('deleted.users.json', $fullDeletedJson . PHP_EOL);
        }else{
            file_put_contents('deleted.users.json', "");
        }
        
    }



function decodeUsers()
{
    $jsonFile = file_get_contents('users.json');
    $jsonUsers = explode(PHP_EOL , $jsonFile);
    array_pop($jsonUsers);
    foreach($jsonUsers as $jsonUser)
    { 
        $users[]=json_decode($jsonUser, true);        
    }
    return $users;    
}

function decodeDeletedUsers()
{
    $jsonFile = file_get_contents('deleted.users.json');
    $jsonUsers = explode(PHP_EOL , $jsonFile);
    array_pop($jsonUsers);

    foreach($jsonUsers as $jsonUser)
    {
        
        $users[]=json_decode($jsonUser, true);        
    }
    return $users;
}

function findJsonUser($data)
{
    if(decodeUsers()!= null)
        {
            strpos($data);

        }    
    
}

function findUserWhitName($data)
{
    if(decodeUsers()!= null)
        {
            $users=decodeUsers();   
            foreach($users as $user)
            {
                if($user['username'] == $data)
                {    
                    return $user;
                    exit;
                }
            }
        }    
    
}
function findUser(array $data)
{
    if(file_get_contents('users.json') != "")
        {
            if(decodeUsers()!= null)
            {
                $users=decodeUsers();   
                foreach($users as $user)
                {
                    if($user['username'] == $data['username'])
                    {    
                        return $user;
                        exit;
                    }
                }
            } 
        }else{
            return null;
        }
       
    
}


function checkPassword($data, $foundUser)
    {
        return password_verify($data['password'], $foundUser['password']);
    }

function Login($foundUser)
    {
        $_SESSION['username']=$foundUser['username'];
        $_SESSION['role']=$foundUser['role'];
        setcookie('username', $foundUser['username'], time()+3600);
    }
function userRecord($foundUser)
    {
    setcookie ('userRecord', $foundUser['username'], time()+(60*60*24*30*12));
    
    }

function adminController()
    {
        if($_SESSION['role']==7)
            {
                return true;
            }
            else{
                return false;
            }
        
    }
function loginController()
{
    if(isset($_SESSION['username']))
    {
        return true;
    }elseif(isset($_COOKIE['username']))
    {
        $_SESSION['username']=$_COOKIE['username'];
        return true;
    }else{
        return false;
    }

}


function logout()
    {
        session_destroy();
        setcookie('username', "", time()-1);
    }

function uploadAvatar($user)
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
    







    
?>