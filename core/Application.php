<?php

/**
 * class Application
 * 
 * @author Alvin Kigen <alvinkigen997@gmail.com>
 * @package ${Namespace}
 * 
 */

class Application

{
  public  Router $router;
  public function __construct()
  {
    $this->router=new Router();
  }
}
?>