<?php

namespace app\models;

class Product extends DbModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;

    protected $props = ['name', 'description', 'price', 'image'];

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

   public function getProperties()
   {
       return (object) array("name" => $this->name,
                            "description" => $this->description,
                            "price" => $this->price,
                            "image" => $this->image);
   }

}