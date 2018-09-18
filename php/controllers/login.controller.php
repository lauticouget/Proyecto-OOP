<?php
include_once 'php/cookieAdmin/session.cookie.php';
include_once 'php/classes/db/Json.php';

class LoginController
{

    public function logedControl()
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



    
}
$LoginController=new LoginController;


if($_POST)
{
 
  if ($Json->findUser($_POST))
  {
    $foundUser= $Json->findUser($_POST);
    if($LoginController->checkPassword($_POST,$foundUser)) 
      {        
        $LoginController->login($foundUser);
        
        if($LoginController->logedControl())
          {
            if(isset($_POST['userRecord']))
              {
                $SessionCookie->userRecord($foundUser);
              }
            header('location: index.php');
          }
      }
      
  }
  
}
