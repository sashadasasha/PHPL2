<?php

use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

spl_autoload_register([new Autoload(), 'loadClass']);



//$product->insert();
//var_dump($product->name);
//var_dump($product->id);
$product = new Product();
// $product = $product->getOne(8);
// var_dump($product->id);
// $product->delete();








