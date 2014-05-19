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
        'stu_name' => 'required',
        'stu_sex' => 'required',
        'stu_birdday' => 'required',
        'stu_address' => 'required',
        'stu_hometown' => 'required',
        'stu_province_id' => 'required',
        'stu_phone' => 'required',
        'stu_email' => 'required',
        'stu_facebook' => 'required',
        'stu_married' => 'required',
        'stu_educated' => 'required',
        'stu_type_disabilities' => 'required',
        'stu_person_authen_name' => 'required',
        'stu_person_authen_address' => 'required',
        'password'=>'required|alpha_dash|confirmed',
    ];
    protected $rules_update = [
        'stu_name' => 'required',
        'stu_sex' => 'required',
        'stu_birdday' => 'required',
        'stu_address' => 'required',
        'stu_hometown' => 'required',
        'stu_province_id' => 'required',
        'stu_phone' => 'required',
        'stu_email' => 'required',
        'stu_facebook' => 'required',
        'stu_married' => 'required',
        'stu_educated' => 'required',
        'stu_type_disabilities' => 'required',
        'stu_person_authen_name' => 'required',
        'stu_person_authen_address' => 'required',
    ];
    public function UpdateValidate($input){
        $this->rules = $this->rules_update;
        return $this->validate($input);
    }

} 