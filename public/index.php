<?php
session_start();

use app\controllers\CoreController;
use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

spl_autoload_register([new Autoload(), 'loadClass']);

$url = explode('/', $_SERVER['REQUEST_URI']);
// var_dump($url);
// $controllerName = $_GET['c']? : 'product';
// $action = $_GET['a'];

$controllerEx = new CoreController();
$controllerUrl = $controllerEx->getUrl();
//var_dump($controllerUrl);
if (empty($controllerUrl)) {
  var_dump($controllerEx);
  $controllerEx->actionIndex();
} else {
  $controllerName = $controllerUrl[0];
  $controllerAction = $controllerUrl[1];
  $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
  //var_dump($controllerClass);
    if (class_exists($controllerClass)) {
      //var_dump($controllerClass);
      $controller = new $controllerClass();
      $controller->runAction($controllerAction);
    } else {
      echo "404 controller";
    }
}

//$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
//var_dump($controllerClass);

// $db = mysqli_connect('127.0.0.1:3306', 
// 'root', 
// 'root', 
// 'shop');
// var_dump($db);
// // 







