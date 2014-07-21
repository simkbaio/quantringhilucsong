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
            $student  = \Student::create($input);
            $account_data = [
                'email' => $student->email,
                'first_name' => $student->first_name,
                'last_name' => $student->last_name,
                'password'=>$input['password'],

            ];
            $account = \Sentry::createUser(array(
                'email' => $account_data['email'],
                'password' => $account_data['password'],
                'first_name' => ucfirst($account_data['first_name']),
                'last_name' => ucfirst($account_data['last_name']),
                'activated' => true,
            ));
            $group = \Sentry::findGroupById(7);
            $account->addGroup($group);
            $student->user_id = $account->id;
            $student->save();
            return \Redirect::to('/')
                ->withFlashMessage('Bạn Đã đăng kí thành công tài khoản học viên của Nghị Lực Sống.</br>
                Xin mời đăng nhập để có thể sử dụng đầy đủ tính năng của website');
        }

     }
    public function facebookLogin(){
        $code = \Input::get( 'code' );

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
                try{
                    $user = \Sentry::findUserById($student->user_id);
                }catch (\Exception $e){
                    return \Redirect::to('/')
                        ->withFlashMessage('Tài khoản đăng nhập của bạn chưa được tạo, liên hệ với Admin để được hỗ trợ');
                }
                if(\Sentry::check()){
                    return \Redirect::to('/');
                }

                if($user ){
                    \Sentry::login($user,false);
                    return \Redirect::to('/');
                }else{
                    return \Redirect::to('/')
                        ->withFlashMessage('Tài khoản đăng nhập của bạn chưa được tạo, liên hệ với Admin để được hỗ trợ');
                }
            }
            $student = new \Student();
            $student->facebook_id = (isset($result['id']))?$result['id']:null;
            if(isset($result['birthday']))
                $student->birthday = strtotime($result['birthday']);
            if($result['email'])
                $student->email = $result['email'];
            if(isset($result['first_name']))
                $student->first_name = $result['first_name'];
            if(isset($result['last_name']))
                $student->last_name = $result['last_name'];
            if(isset($result['first_name']) && isset($result['last_name']))
                $student->name = $result['first_name']." ".$result["last_name"];
            if(isset($result['gender']))
                $student->sex = ($result['gender']=='male')?1:0;
            if(isset($result['hometown']))
                $hometown = str_replace(", Vietnam","",$result["hometown"]["name"]);
            $student->hometown = $hometown;

            $input = [
              'email' => $student->email,
                'first_name' => $student->first_name,
                'last_name' => $student->last_name,
                'password'=>\Str::random(8),

            ];
            $account = \Sentry::createUser(array(
                'email' => $input['email'],
                'password' => $input['password'],
                'first_name' => ucfirst($input['first_name']),
                'last_name' => ucfirst($input['last_name']),
                'activated' => true,
            ));
            $group = \Sentry::findGroupById(7);
            $account->addGroup($group);
            $student->user_id = $account->id;
            $student->save();
            \Sentry::login($account);
            return \Redirect::to('dashbroad')
                ->withFlashMessage('Bạn Đã đăng kí thành công tài khoản học viên của Nghị Lực Sống!');




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
    public function login(){
        return dd(\Input::all());
    }


} 