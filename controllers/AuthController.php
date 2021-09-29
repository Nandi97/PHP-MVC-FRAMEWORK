<?php

/** User; Alvin Kigen */

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;

/**
 * Class siteController
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\controllers
 */
class AuthController extends Controller
{
  public function login()
  {
    $this->setLayout('auth');
    return $this->render('login');
  }
  public function register(Request $request)
  {
    $user = new User();
    if ($request->isPost()) {

      $user->loadData($request->getBody());

      if ($user->validate() && $user->save()) {
        return 'Success';
      }
      return $this->render('register', [
        'model' => $user
      ]);
    }
    $this->setLayout('auth');

    return $this->render('register', [
      'model' => $user
    ]);
  }
}
