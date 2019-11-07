<?php

namespace app\models;

class Product extends DbModel
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image;

    public $props = ['name', 'description', 'price', 'image'];

    public function __construct($name="", $description = "", $price = null, $image = "") 
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

   public static function getTableName()
   {
        return "products";
   }

}