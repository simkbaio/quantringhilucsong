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
        'course_name'=>'required|max:250',
        'course_start'=>'required|date',
        'course_end'=>'required|date',


    ];
} 