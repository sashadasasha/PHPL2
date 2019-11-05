<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($name="", $description = "", $price = null, $id = null)
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->id = $id;
    }

   public function getTableName()
   {
       return "products";
   }


}