<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/9/2014
 * Time: 5:12 PM
 */

namespace Acme\Forms;
use Laracasts\Validation\FormValidator;

class profileForm extends FormValidator {

    protected $rules = array(
        'location'=>'required',
        'facebook_username'=>'required',
        'google_username'=>'required',
        'twitter_username'=>'required',
    );
    protected $messages = array(
        'location.required'=>'Bạn chưa nhập địa chỉ',
        'facebook_username.required'=>'Bạn chưa nhập địa chỉ facebook',

    );

} 