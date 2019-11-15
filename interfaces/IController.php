<?php

namespace app\interfaces;

interface IController
{
  public function runAction();
  public function render($template, $params = []);
  public function renderTemplate($template, $params = []);
}