<?php


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


   
?>