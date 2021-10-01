<?php

/**User: Alvin Kigen */

namespace app\models;

use app\core\Model;

/**
 * Class User
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\models
 */
class ContactForm extends Model
{
  public string $subject = '';
  public string $email = '';
  public string $body = '';
  public function rules(): array
  {
    return [
      'subject' => [self::RULE_REQUIRED],
      'email' => [self::RULE_REQUIRED],
      'body' => [self::RULE_REQUIRED],
    ];
  }

  public function labels(): array
  {
    return [
      'subject' => 'Enter your subject',
      'email' => 'Enter your Email',
      'body' => 'Body',
    ];
  }
  public function send()
  {
    return true;
  }
}