<?php
/** User; Alvin Kigen */
namespace app\controllers;

use app\core\Application;

/**
 * Class siteController
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\controllers
 */
class SiteController
{

  public static function contact()
  {
    return Application::$app->router->renderView('contact');
  }

  public static function handleContact()
  {
    return 'Handling submitter data';
  }
}