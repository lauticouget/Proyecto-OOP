<?php
 include_once 'Base.php';


 class Json extends Base
{
    public function decodeUsers()
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
    function findUser(array $data)
    {
        if(file_get_contents('users.json') != "")
            {
                if($this->decodeUsers() != null)
                {
                    $users= $this->decodeUsers();   
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

    
}
$Json = new JSon;