<?php

/**user: Alvin Kigen */

namespace app\core;

/**
 * class Application
 * 
 * @author Alvin Kigen <alvinkigen997@gmail.com>
 * @package app\core
 * 
 */

class Application

{
  public static string $ROOT_DIR;
  public Router $router;
  public Request $request;
  public function __construct($rootPath)
  {
    self::$ROOT_DIR = $rootPath;
    $this->request = new Request();
    $this->router = new Router($this->request);
  }

  public function run()
  {
    echo $this->router->resolve();
  }
}
