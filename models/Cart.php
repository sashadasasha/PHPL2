<?php

namespace app\models;

class Cart extends Model
{
    public $id;
    public $product_id;
    public $name;
    public $ammount;
    public $price;
    public $totalAmmount;
    public function getTableName() {
        return 'cart';
    }

    public function countCart() {
      return 'total ammount';
    }

    public function addProduct($id_product, $ammount){
        return 'product is added';
    }
    public function deleteOneProduct($id_product, $ammount = 1){
        return 'delete one';
    }

    public function deleteAll () {
      return 'cart is empty';
  }
}