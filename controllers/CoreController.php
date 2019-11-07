<?php

namespace app\controllers;

use app\interfaces\IController;

abstract class CoreController implements IController
{
  public $action;
  public $controller;
  static public $layout = 'main';
  static public $useLayout = true;
 

  public static function getUrl() 
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }

  public static function actionIndex() 
  {
    echo static::render('index');
  }

  public static function render($template, $params = []) 
  {
    if (static::$useLayout) {
        return static::renderTemplate("layouts/" . static::$layout, [
            'menu' => static::renderTemplate('menu'),
            'content' => static::renderTemplate($template, $params)
        ]);
    } else {
        return static::renderTemplate($template, $params = []);
    }
  }

  public static function renderTemplate($template, $params = []) 
  {
    ob_start();
    extract($params);
    $templatePath = TEMPLATES_DIR . $template . ".php";
    if (file_exists($templatePath)) {
        include $templatePath;
    }
    return ob_get_clean();
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