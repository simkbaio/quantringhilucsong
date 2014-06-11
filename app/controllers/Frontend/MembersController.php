<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 6/9/2014
 * Time: 4:51 PM
 */

namespace Frontend;


use Acme\Forms\StudenForm;

class MembersController extends \BaseController {
    protected  $memberForm;
    function __construct(StudenForm $memberForm)
    {
        $this->memberForm = $memberForm;
    }

    public function storeMember(){
        $input = \Input::except("_token","password_confirmation","day","month","year");
        //Valid giá trị nhập vào
        $this->memberForm->SimpleValidate(\Input::all());

        //Convert một số dữ liệu nhập vào
        $input['birthday'] = strtotime(\Input::get('month')."-".\Input::get("day")."-".\Input::get("year"));
        $input['name'] = $input['last_name']." ".$input["first_name"];

        //Kiểm tra email đã tồn tại hay chưa và lưu vào cơ sở dữ liệu
        if(\Student::whereEmail($input['email'])->first()){
            return Redirect::back()->withFlashMessage('Mail đăng kí đã được dùng bởi tài khoản khác!');
        }else{
            \Student::create($input);
            return "Đăng kí thành công!";
        }

     }
    public function facebookLogin(){
        $code = \Input::get( 'code' );

        // get fb service
        $fb = \OAuth::consumer( 'Facebook' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );
            $facebook_id = $result['id'];
            $student = \Student::where("facebook_id",'=',$facebook_id)->first();
            if($student){
                return "Chào mừng: ".$student->name." Quay trở lại!";
            }

            $student = new \Student();
            $student->facebook_id = $result['id'];
            $student->birthday = $result['birthday'];
            $student->email = $result['email'];
            $student->first_name = $result['first_name'];
            $student->last_name = $result['last_name'];
            $student->name = $result['first_name']." ".$result["last_name"];
            $student->sex = ($result['gender']=='male')?1:0;
            $hometown = str_replace(", Vietnam","",$result["hometown"]["name"]);
            $student->hometown = $hometown;
            $student->save();

            return "Đăng kí thành công!";

            //Var_dump
            //display whole array().
            dd($result);

        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return \Redirect::to( (string)$url );
        }
    }
    public function EmailVerify(){

    }


} 