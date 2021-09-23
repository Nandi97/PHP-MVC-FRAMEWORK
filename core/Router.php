<?php

/**user: Alvin Kigen */

namespace app\core;

/** 
 * class router
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\core
 */
class Router
{
  public Request $request;
  protected array $routes = [];

  /**
   * Router constructor.
   * 
   * @param \app\core\Request $request
   */
  public function __construct(\app\core\Request $request)
  {
    $this->request = $request;
  }


  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }
  public function resolve()
  {
    $path = $this -> request-> getPath();
    echo'<pre>';
    var_dump($path);
echo '</pre>';
  }
}
