<?php

/** User; Alvin Kigen */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 * Class siteController
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\controllers
 */
class SiteController extends Controller
{

  public function home()
  {
    $params = [
      'name' => "Alvin Kigen"
    ];
    return $this->render('home', $params);
  }

  public function contact()
  {
    return $this->render('contact');
  }

  public static function handleContact(Request $request)
  {
    $body = $request->getBody();
    echo'<pre>';
    var_dump($body);
    echo'</pre>';
    exit;
    return 'Handling submitted data';
  }
}
