<?php

/**
 * User: Alvin Kigen
 * Date: 10/01/2021
 */

namespace app\core\form;


/**
 * Class BaseField
 *
 * @author  AlvinKigen <cartezalvin@gmail.com>
 * @package app\core\form
 */
class TextareaField extends BaseField
{
    public function renderInput(): string
    {
        return sprintf(
            '<textarea class="form-control%s" name="%s">%s</textarea>',
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }
}