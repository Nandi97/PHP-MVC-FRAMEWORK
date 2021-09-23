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
  public  Router $router;
  public Request $request;
  public function __construct()
  {
    
    $this->request = new Request();
    $this->router = new Router($this->request);
  }
  public function run()
  {
    $this -> router -> resolve();
  }
}
