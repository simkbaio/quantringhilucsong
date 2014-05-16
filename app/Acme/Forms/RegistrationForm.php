<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/8/2014
 * Time: 3:19 PM
 */

namespace Acme\Forms;

use Laracasts\Validation\FormValidator;


class RegistrationForm extends FormValidator
{
    protected $rules = [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed',

    ];
} 