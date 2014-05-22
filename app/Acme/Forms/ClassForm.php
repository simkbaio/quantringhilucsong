<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/22/2014
 * Time: 2:24 PM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class ClassForm extends FormValidator {
    public $rules = [
        'class_name'=>'required'
];
} 