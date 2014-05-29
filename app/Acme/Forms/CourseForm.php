<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/21/2014
 * Time: 2:42 PM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class CourseForm extends FormValidator {
    protected $rules = [
        'name'=>'required|max:250',
        'start'=>'required|date',
        'end'=>'required|date',


    ];
} 