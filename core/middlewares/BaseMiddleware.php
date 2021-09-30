<?php

/** User: Alvin Kigen */

namespace app\core\middlewares;

use app\core\Application;

/**
 * Class BaseMiddleware
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\core\middlewares
 */
abstract class BaseMiddleware
{
  abstract public function execute();
}