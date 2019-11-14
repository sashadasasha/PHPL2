<?php

namespace app\engine;

class Render
{
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
}