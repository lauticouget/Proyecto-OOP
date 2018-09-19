<?php 

class User
{
    private $nombre;
    private $email;
    private $password;
    private $direccion;



    public function __construct(string $nombre, string $email, string $password, string $direccion)
    {
        $this->nombre=$nombre;
        $this->email=$email;
        $this->password=$password;
        $this->direccion= $direccion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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

    public function getDireccion()
    {
        return $this->direccion;
    }


    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }
}

