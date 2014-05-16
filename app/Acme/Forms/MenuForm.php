<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/13/2014
 * Time: 5:33 PM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class MenuForm extends FormValidator {
    protected $rules = [
      'title'=>'required|max:250',
    ];
} 