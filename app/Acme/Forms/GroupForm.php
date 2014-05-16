<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/15/2014
 * Time: 4:30 PM
 */

namespace Acme\Forms;


use Laracasts\Validation\FormValidator;

class GroupForm extends FormValidator {
    protected $rules = [
      'name'=>'required|max:250|unique:groups',
    ];
    protected $rules_update = [
      'name'=>'required|max:250',

    ];
    public function UpdateValidate($input){
        $this->rules = $this->rules_update;
        return $this->validate($input);
    }
} 