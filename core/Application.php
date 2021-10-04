<?php

/**user: Alvin Kigen */

namespace app\core;

use app\core\db\Database;

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

  public static Application $app;
  public string $layout = 'main';
  public string $userClass;
  public Router $router;
  public Request $request;
  public Response $response;
  public ?Controller $controller = null;
  public Session $session;
  public Database $db;
  public ?UserModel $user;
  public View $view;


  public function __construct($rootPath, $config)
  {
    $this->user = null;
    $this->userClass = $config['userClass'];
    self::$ROOT_DIR = $rootPath;
    self::$app = $this;
    $this->request = new Request();
    $this->response = new Response();
    $this->session = new Session();
    $this->router = new Router($this->request, $this->response);
    $this->db = new Database($config['db']);
    $this->view = new View();


    $value = $this->session->get('user');
    if ($value) {
      $primaryKey = $this->userClass::primaryKey();
      $this->user = $this->userClass::findOne([$primaryKey => $value]);
    }
  }
  public static function isGuest()
  {
    // echo '<pre>';
    // var_dump(self::$app->user);
    // echo '</pre>';
    return !self::$app->user;
  }

  public function run()
  {
    try {
      echo $this->router->resolve();
    } catch (\Exception $e) {
      $this->response->setStatusCode($e->getCode());
      echo $this->view->renderView('_error', [
        'exception' => $e
      ]);
    }
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

  public function login(UserModel $user)
  {
    $this->user = $user;
    $primaryKey = $user->primaryKey();
    $this->session->set('user', $primaryKey);

    return true;
  }

  public function logout()
  {
    $this->user = null;
    $this->session->remove('user');
  }
}