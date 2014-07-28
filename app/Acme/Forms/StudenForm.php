<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/19/2014
 * Time: 11:09 AM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class StudenForm extends FormValidator
{
    protected $rules = [
        'name' => 'required',
        // 'sex' => 'required',
        // 'birthday' => 'required',
        // 'address' => 'required',
        // 'hometown' => 'required',
        // 'province_id' => 'required',
        // 'phone' => 'required',
        'email' => 'required|unique:hosohocvien_db.tbl_student,email',
        // 'facebook' => 'required',
        // 'married' => 'required',
        // 'educated' => 'required',
        // 'type_disabilities' => 'required',
        // 'person_authen_name' => 'required',
        // 'person_authen_address' => 'required',
        'password'=>'required|alpha_dash|confirmed',
    ];
    protected $rules_update = [
        'name' => 'required',
        // 'sex' => 'required',
        // 'birthday' => 'required',
        // 'address' => 'required',
        // 'hometown' => 'required',
        // 'province_id' => 'required',
        // 'phone' => 'required',
//        'email' => 'required|unique:hosohocvien_db.tbl_student,email',
        // 'facebook' => 'required',
        // 'married' => 'required',
        // 'educated' => 'required',
        // 'type_disabilities' => 'required',
        // 'person_authen_name' => 'required',
        // 'person_authen_address' => 'required',
        'new_password'=>'alpha_dash|confirmed'
    ];
    protected $rules_simple = [
        'last_name' => 'required',
        'first_name' => 'required',
        'email' => 'required',
        'password' => 'required|confirmed',

    ];
    public function UpdateValidate($input){
        $this->rules = $this->rules_update;
        return $this->validate($input);
    }
    public function SimpleValidate($input){
        $this->rules = $this->rules_simple;

        return $this->validate($input);

    }
} 