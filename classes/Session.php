<?php 



class Session
{
    public static function Login($foundUser)
    {
        session_start();
        dd($_SESSION);
        $_SESSION['username']=$foundUser['username'];
        $_SESSION['role']=$foundUser['role'];
        setcookie('username', $foundUser['username'], time()+3600);
    }
    public static function userRecord($foundUser)
    {
    setcookie ('userRecord', $foundUser['username'], time()+(60*60*24*30*12));
    
    }
    public static function adminController()
    {
        if (isset($_SESSION['role'])){
            if($_SESSION['role']==7){
                return true;
            }
            else{
                return false;
            }
        }
        
        
    }
    public static function loginController()
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
    public static function logout()
    {
        session_destroy();
        setcookie('username', "", time()-1);
    }
}

