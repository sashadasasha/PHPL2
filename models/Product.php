<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($id = null, $name = null, $description = null, $price = null) {
       
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
    public static function getTableName()
    {
        return 'products';
    }




}