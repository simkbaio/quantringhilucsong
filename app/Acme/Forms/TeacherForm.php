<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/19/2014
 * Time: 11:09 AM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class TeacherForm extends FormValidator
{
    protected $rules = [
        'teacher_name'=>'required',
        'teacher_phone'=>'required',
        'teacher_address'=>'required',
        'teacher_email'=>'required',
    ];
    protected $rules_update = [

    ];
    public function UpdateValidate($input){
        $this->rules = $this->rules_update;
        return $this->validate($input);
    }

} 