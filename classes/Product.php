<?php
class Product
{
    private $name;
    private $price;
    private $category;
    private $imageExt;
    private $imageRoot;
    private $id;

    public function __construct(string $name, float $price, string $category, string $imageExt) {
        $this->name=$name;
        $this->price=$price;
        $this->category=$category;
        $this->imageExt=$imageExt;
        $this->imageRoot ="images/products/". $name . "." .$imageExt;
        $this->id=null;
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

    public function getCategory()
    {
        return $this->category;
    }
 
    public function setCategory($category)
    {
        $this->category = $category;

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

    public function getImageExt()
    {
        return $this->imageExt;
    }

    public function setImageExt($imageExt)
    {
        $this->imageExt = $imageExt;

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
 
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }
}