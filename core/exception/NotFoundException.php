<?php

/**
 * User: Alvin Kigen
 * Date: 9/30/2020
 */

namespace app\core\exception;


/**
 * Class NotFoundException
 *
 * @author  Alvin Kigen <cartezalvin@gmail.com>
 * @package app\core\exception
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}