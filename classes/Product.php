<?php

class Product
{
    private $name;
    private $price;
    private $category;
    private $imageRoot;


    public function __construct(string $name, float $price, string $category, string $imageRoot) {
        $this->name=$name;
        $this->price=$price;
        $this->category=$category;
        $this->imageRoot->$imageRoot;
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

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
 
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getImageRoot()
    {
        return $this->imageRoot;
    }

    public function setImageRoot($imageRoot)
    {
        $this->imageRoot = $imageRoot;

        return $this;
    }
}