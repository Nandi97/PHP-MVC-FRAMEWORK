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
  public Response $response;
  public Session $session;
  public Database $db;

  public static Application $app;
  public Controller $controller;
  public function __construct($rootPath, array $config)
  {
    self::$ROOT_DIR = $rootPath;
    self::$app = $this;
    $this->request = new Request();
    $this->response = new Response();
    $this->session = new Session();
    $this->router = new Router($this->request, $this->response);

    $this->db = new Database($config['db']);
  }

  public function run()
  {
    echo $this->router->resolve();
  }
  /**
   * @return \app\core\Controller
   */

  public function getController(): \app\core\Controller
  {
    return $this->controller;
  }

  /**
   * @param \app\core\Controller $controller
   */
  public function setController(\app\core\Controller $controller): void
  {
    $this->controller = $controller;
  }
}