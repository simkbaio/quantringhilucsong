<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/12/2014
 * Time: 3:48 AM
 */

namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class UserForm extends FormValidator {
    protected $rules = array(
        'email'=>'required|email|max:250|unique:users',
        'password'=>'required|max:250|confirmed',
        'first_name'=>'required|max:250',
        'last_name'=>'required|max:250'
    );
    protected $rules_update = array(
        'first_name'=>'required|max:250',
        'last_name'=>'required|max:250',
    );
    protected $rules_changepassword = [
        'password'=>'required|between:6,15|confirmed',
    ];
    protected $rules_requestresetpassword = array(
        'email'=>'required|exists:users,email',
    );

    public function CreateValidate($input){
        return $this->validate($input);
    }
    public function UpdateValidate($input){
        $this->rules = $this->rules_update;
        return $this->validate($input);
    }
    public function ChangePasswordValidate($input){
        $this->rules = $this->rules_changepassword;
        return $this->validate($input);
    }
    public function RequestResetPasswordValidate($input){
        $this->rules = $this->rules_requestresetpassword;
        return $this->validate($input);
    }
} 