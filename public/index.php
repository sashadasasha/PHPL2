<?php
session_start();

use app\controllers\CoreController;
use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db, Render, TwigRender};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");
require_once '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$url = explode('/', $_SERVER['REQUEST_URI']);


$controllerEx = new CoreController(new Render());
$controllerUrl = $controllerEx->getUrl();
//var_dump($controllerUrl);
if (empty($controllerUrl)) {
  //var_dump($controllerEx);
  $controllerEx->actionIndex();
} else {
  $controllerName = $controllerUrl[0];
  $controllerAction = $controllerUrl[1];
  $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
  //var_dump($controllerClass);
    if (class_exists($controllerClass)) {
      //var_dump($controllerClass);
      $controller = new $controllerClass(new TwigRender());
      $controller->runAction($controllerAction);
    } else {
      echo "404 controller";
    }
}








