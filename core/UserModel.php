<?php

/** User: Alvin Kigen */

namespace app\core;

use app\core\db\DbModel;

/**
 * Class UserModel
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\core
 */
abstract class UserModel extends DbModel
{
  abstract public function getDisplayName(): string;
}