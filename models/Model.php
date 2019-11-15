<?php

namespace app\models;

use app\interfaces\IModels;

abstract class Model implements IModels
{
  public function __get($property)
  {
    //var_dump($this->name); 
  return $this->$property;
  }
  
  public function __isset($property)
  {
      //var_dump($this->name);   
      return isset($this->$property);
  } 

  public function __set($property, $value)
  {
      $this->$property = $value;
      $this->props[$property] = true;
      //var_dump($this->props);
  }
}