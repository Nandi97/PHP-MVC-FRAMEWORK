<?php
/** User: Alvin Kigen */

namespace app\core;

/**
 * Class Contoller
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\core
 */
class Controller 
{
  public string $layout = 'main';
  public function setLayout ($layout)
  {
$this->layout = $layout;
  }
  public function render($view, $params = [])
  {
    return Application::$app->router->renderView($view, $params);
  }
}