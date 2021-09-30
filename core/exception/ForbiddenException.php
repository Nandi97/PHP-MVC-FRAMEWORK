<?php

/**
 * User: TheCodeholic
 * Date: 9/30/2021
 * 
 */

namespace app\core\exception;


use thecodeholic\phpmvc\Application;

/**
 * Class ForbiddenException
 *
 * @author  Alvin Kigen <cartezalvin@gmail.com>
 * @package app\core\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}