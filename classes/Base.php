<?php

abstract class Base
{
    
    abstract public function createUser($data);
    abstract public function saveUser($data);
    abstract public function eraseUser($data);
    abstract public function restoreUser($data);
    abstract public function findUser(array $data);
  
}