<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/16/2014
 * Time: 4:08 AM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class PermissionForm extends FormValidator {
    protected $rules = [
        'name'=>'required|max:250',
    ];
} 