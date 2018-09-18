<?php

class SessionCookie
{
    function userRecord($foundUser)
    {
    setcookie ('userRecord', $foundUser['username'], time()+(60*60*24*30*12));
    }

   
}
$sessionCookie= new SessionCookie;