<?php

namespace app\controllers;

use app\interfaces\IController;
use app\engine\{TwigRender, Render, Request};
use app\interfaces\IRenderer;
use app\models\Basket;

class CoreController implements IController
{
  public $action;
  public $controller;
  public $layout = 'main';
  public $useLayout = true;
  private $renderer;
  public $request;

 
  public function __construct ($renderer)
  {
    $this->renderer = $renderer;
    $this->request = new Request;
  }

  public function actionIndex() 
  {
    echo $this->render('index');
  }

  public function render($template, $params = []) 
  {
    if ($this->useLayout) {
        return $this->renderTemplate("layouts/" . $this->layout, [
            'menu' => $this->renderTemplate('menu', ['counter' => Basket::getCountWhere('session_id', session_id())]),
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
    if (method_exists($this, $method)) {
        $this->$method();
    } else {
        echo "404 action";
    }
  }

}