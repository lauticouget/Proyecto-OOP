<?php

abstract class Base
{
    
    abstract public function createUser();
    abstract public function saveUser();
    abstract public function erraseUser();
    abstract public function restoreUser();
    abstract public function findUser();
    
   
}