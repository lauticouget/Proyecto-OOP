<?php
require 'Base.php';
 class Json extends Base
{
    public function createUser($data)
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
    public function generateId()
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

    public function saveUser($user)
    {
        $jsonUser=json_encode($user);
        file_put_contents('users.json', $jsonUser . PHP_EOL, FILE_APPEND);
        
    }
    public function eraseUser($data)
        {
            $users=$this->decodeUsers();
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
    public function restoreUser($data)
    {
        $deletedUsers=$this->decodeDeletedUsers();
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
            if(count($jsonDeletedUsers) > 0){
                $fullDeletedJson=implode(PHP_EOL, $jsonDeletedUsers);
                file_put_contents('deleted.users.json', $fullDeletedJson . PHP_EOL);
            }else{
                file_put_contents('deleted.users.json', "");
            }
            
    }
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
    public function decodeDeletedUsers()
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
    public function findJsonUser($data)
    {
        if(decodeUsers()!= null)
            {
                strpos($data);

            }    
        
    }
    public function findUserWhitName($data)
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
    public function findUser(array $data)
    {
        if(file_get_contents('users.json') != "")
            {
                if($this->decodeUsers() != null)
                {
                    $users = $this->decodeUsers();   
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
$jsonManager= new Json;