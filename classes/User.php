<?php 

class User
{
    private $name;
    private $username;
    private $email;
    private $password;
    private $role;
    private $id;



    public function __construct(string $name, string $username, string $email, string $password, int $role, int $id)
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        $this->username=$username;
        $this->role=$role;
        $this->id=$id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    } 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

$userArray=$jsonManager->findUserWhitName($_SESSION['username']);
$user=new User ($userArray['name'], $userArray['username'], $userArray['email'], $userArray['password'], $userArray['role'], $userArray['id']);
