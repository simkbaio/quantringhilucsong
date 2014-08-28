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
    public  $rules = [
        'first_name'=>'required',
        'last_name'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'email'=>'required|unique:users,email',
	    'password'=>'required|confirmed',
    ];
    protected $rules_update = [
	    'first_name'=>'required',
	    'last_name'=>'required',
	    'phone'=>'required',
	    'address'=>'required',
	    'email'=>'required',

    ];
    public function UpdateValidate($input){
        $this->rules = $this->rules_update;
        return $this->validate($input);
    }


} 