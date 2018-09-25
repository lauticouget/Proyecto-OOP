<?php 

class Cart 

{

    private $user;
    private $products;

    public function __construct(User $user)
    {
        $this->User= $user;
        $this->products= [];
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }
    public function setProducts(Product $product)
    {
        $this->products[] = $product;

        return $this;
    }
}
$cart= new Cart($user);