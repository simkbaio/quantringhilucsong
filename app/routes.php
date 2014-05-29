<?php
#home
use \Carbon\Carbon;
Route::get('/',function(){
    return View::make('frontend.layouts.master');
});
Route::get('facebook',function(){

     // get data from input
    $code = Input::get( 'code' );


    // get fb service
    $fb = OAuth::consumer( 'Facebook' );
         $url = $fb->getAuthorizationUri();

        // return to facebook login url
        return Redirect::to( (string)$url );

    // check if code is valid

    // if code is provided get user data and sign in
    if ( !empty( $code ) ) {

        // This was a callback request from facebook, get the token
        $token = $fb->requestAccessToken( $code );

        // Send a request with it
        $result = json_decode( $fb->request( '/me' ), true );

        $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
        echo $message. "<br/>";

        //Var_dump
        //display whole array().
        dd($result);

    }
    // if not ask for permission first
    else {
        // get fb authorization
        $url = $fb->getAuthorizationUri();

        // return to facebook login url
        return Redirect::to( (string)$url );
    }

});
Route::get('facebook/logout',function(){
    return "Log";
});
Route::get('facebook/login',function(){
   $profile = Facebook::api('/me?fields=id,name,first_name,last_name,username,email,gender,birthday,hometown,location,picture.width(100)');
   return dd(Facebook::getUser());
   $login_url = Facebook::loginUrl();
   return View::make('hello')->with('login_url',$login_url);
});
Route::get('admin',['as'=>'admin','uses'=>'AdminPagesController@index'])->before('auth_admin');
Route::get('admin/notice',['as'=>'admin.notice','uses'=>'AdminPagesController@notice']);
Route::get('thuxem',function(){
    return View::make('hello');

# Issue the call to the client.
//    $result = $mgClient->get($domain."/campaings/".$campaignId."/stats");
    return $domain."/campaings/".$campaignId."/stats";
# Make the call to the client.
//    $result = $mgClient->sendMessage("$domain",
//        array('from'       => 'Developer <noreply@ecnet.vn>',
//            'to'         => 'DEV <dev@ecnet.vn>',
//            'subject'    => 'Hello DEV',
//            'text'       => 'Testing some Mailgun awesomness!',
//            'o:campaign' => 'c8vng'));

//    $result = $mgClient->post("lists/$listAddress/members",
//        array('address'     => 'simkbaio@gmail.com',
//            'name'        => 'Ngọc Anh',
//            'description' => 'Developer',
//            'subscribed'  => true,
//        ));
});
Route::get('theme',function(){
    return View::make('admin.example');
});

# Registration
Route::get('register', ['uses' => 'RegistrationController@create'])->before('guest');
Route::post('register',['as'=>'registration.store','uses'=>'RegistrationController@store']);
Route::post('admin/users/resetpasswordrequest',['as'=>'admin.users.resetpasswordrequest','uses'=>'UsersController@ResetPasswordRequest']);
Route::any('admin/user/{id}/resetpassword/{resetcode}',['uses'=>'UsersController@ResetPassword']);


#Profile
//Route::get('/{profile}','ProfilesController@show');
//Route::get('/{profile}/edit',array('as'=>'profile.edit','uses'=>'ProfilesController@edit'));
//Route::post('/{profile}/edit',array('as'=>'profile.edit','uses'=>'ProfilesController@update'));


//Route::resource('profile','ProfilesController',['only'=>['update','destroy','store']]);lo
Route::get('admin/login',['as'=>'admin.login','uses'=>'SessionsController@create']);
Route::resource('admin/sessions','SessionsController',['only'=>['create','store','destroy']]);

Route::group(array('prefix' => 'admin','before'=>'auth_admin'), function () {
    #Authendication
    Route::get('logout',['as'=>'admin.logout','uses'=>'SessionsController@destroy']);
    

    #Users
    Route::post('users/{id}/resetpassword/{resetCode}',['as'=>'admin.users.changepassword','uses'=>'UsersController@changepassword']);
    Route::resource('users', 'UsersController');
    #Groups
    Route::resource('groups','GroupsController');
    #Permissions
    Route::resource('permissions','PermissionsController');

    Route::post('menuspacks/update-order/{id}',['as'=>'admin.menuspacks.update-order','uses'=>'MenusPacksController@updateorder']);
    Route::resource('menuspacks','MenusPacksController');

    Route::get('menus/delete/{id}',['uses'=>'MenusController@QuickDeleteMenu']);
    Route::resource('menuspacks.menus','MenusController');

    ##Quản lý học viên
    #Sinh viên
    Route::resource('students','StudentsController');
    Route::post('students/changepassword/{id}',['as'=>'admin.students.changepassword','uses'=>'StudentsController@changepassword']);


    Route::resource('teachers','TeachersController');

    Route::post('class/{id}/addstudent',['as'=>'admin.classes.addstudent','uses'=>'ClassesController@addstudent']);
    Route::resource('classes','ClassesController');
    Route::resource('courses','CoursesController');
    Route::resource('disablities','DisablitiesController');
    Route::get('ajax/changelog',['as'=>'admin.ajax.changelog','uses'=>'AjaxController@changelog']);


});
