<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/8/2014
 * Time: 4:26 PM
 */

namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class LoginForm extends FormValidator
{
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];
} 