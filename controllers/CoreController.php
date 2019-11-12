<?php

namespace app\controllers;

use app\interfaces\IController;
use app\engine\Render;

class CoreController implements IController
{
  public $action;
  public $controller;
  public $layout = 'main';
  public $useLayout = true;
  private $renderer;
 
  public function __construct ()
  {
    $this->renderer = new Render();
  }

  public function getUrl() 
  {
    $url = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($url);
    array_pop($url);
    return $url;
  }
  

  public function actionIndex() 
  {
    echo $this->render('index');
  }

  public function render($template, $params = []) 
  {
    if ($this->useLayout) {
        return $this->renderTemplate("layouts/" . $this->layout, [
            'menu' => $this->renderTemplate('menu'),
            'content' => $this->renderTemplate($template, $params)
        ]);
    } else {
        return $this->renderTemplate($template, $params = []);
    }
  }
  public function renderTemplate($template, $params = []) 
  {
    return $this->renderer->renderTemplate($template, $params);
  }

  public function runAction($action = null) 
  {
    $method = "action" . ucfirst($action);
    //var_dump($method);
    if (method_exists($this, $method)) {
        $this->$method();
    } else {
        echo "404 action";
    }
  }

}