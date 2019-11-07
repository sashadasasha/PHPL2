<?php

namespace app\interfaces;

interface IController 
{
  public static function getUrl();
  public function runAction();
  public static function render($template, $params = []);
  public static function renderTemplate($template, $params = []);
}