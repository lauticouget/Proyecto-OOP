<?php

class Product
{
    private $nombre;
    private $precio;

    public function __construct(string $nombre, float $precio) {
        $this->nombre=$nombre;
        $this->precio=$precio;
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

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }
}