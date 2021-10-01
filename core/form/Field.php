<?php

/** User: Alvin Kigen */

namespace app\core\form;

use app\core\Model;

/**
 * Class Field
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\core\form
 */
class Field extends BaseField
{
        const  TYPE_TEXT = 'text';
      const  TYPE_PASSWORD = 'password';
       const  TYPE_NUMBER = 'number';

  public string $type;

  /**
   * Field constructor
   * 
   * @param \app\core\Model $model
   * @param string $attribute
   */
  public function __construct(Model $model, string $attribute)
  {
    $this->type = self::TYPE_TEXT;
    parent::__construct($model, $attribute);
  }


  public function passwordField()
  {
    $this->type = self::TYPE_PASSWORD;
    return $this;
  }

  public function renderInput(): string
  {
    return sprintf(
      '<input type="%s" name="%s" value="%s" class="form-control%s">',
      $this->type,
      $this->attribute,
      $this->model->{$this->attribute},
      $this->model->hasError($this->attribute) ? '  is-invalid' : '',
    );
  }
}