<?php 
session_Start();
class Session
{
    public function Login($foundUser)
    {
        $_SESSION['username']=$foundUser['username'];
        $_SESSION['role']=$foundUser['role'];
        setcookie('username', $foundUser['username'], time()+3600);
    }
    public function userRecord($foundUser)
    {
    setcookie ('userRecord', $foundUser['username'], time()+(60*60*24*30*12));
    
    }
    public function adminController()
    {
        if($_SESSION['role']==7)
            {
                return true;
            }
            else{
                return false;
            }
        
    }
    public function loginController()
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
    public function logout()
    {
        session_destroy();
        setcookie('username', "", time()-1);
    }
}
$sessionManager= new Session;