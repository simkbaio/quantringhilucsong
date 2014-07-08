<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 6/12/2014
 * Time: 4:05 PM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class SubjectForm extends FormValidator {
    protected $rules = [
        'name'=>'required'
    ];
} 