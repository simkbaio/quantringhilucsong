<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/8/2014
 * Time: 4:26 PM
 */

namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class MenusPackForm extends FormValidator
{
    protected $rules = [
        'name' => 'required|unique:menuspacks',
        'order' => 'required|numeric|max:100',

    ];
    protected $update_rules = [
        'name' => 'required|max:250',
        'order' => 'required|numeric|max:100',

    ];

    public function CreateFormValidate($input)
    {
        return $this->validate($input);
    }

    public function UpdateFormValidate($input)
    {
        $this->rules = $this->update_rules;
        return $this->validate($input);
    }
} 