<?php
session_start();

use app\controllers\CoreController;
use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db, Render, TwigRender, Request};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");
require_once '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName();
$controllerAction = $request->getActionName();

$controllerEx = new CoreController(new Render());
if (empty($controllerName)) {
  $controllerEx->actionIndex();
} else {
  $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
    if (class_exists($controllerClass)) {
      $controller = new $controllerClass(new TwigRender());
      $controller->runAction($controllerAction);
    } else {
      echo "404 controller";
    }
}


// $product = Product::getOne(27);
// var_dump($product);

// $product->name = "Xiaomi RedMi";
// $product->price = 40000;
// var_dump($product);
// $product->save();







