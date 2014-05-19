<?php
#home
Route::get('/',function(){
    return Redirect::to('admin');
});
Route::get('admin',['as'=>'admin','uses'=>'AdminPagesController@index'])->before('auth_admin');
Route::get('thuxem',function(){
    return  Request::server('PATH_INFO');
});
Route::get('theme',function(){
    return View::make('admin.example');
});
# Registration
Route::get('register', ['uses' => 'RegistrationController@create'])->before('guest');
Route::post('register',['as'=>'registration.store','uses'=>'RegistrationController@store']);



#Profile
//Route::get('/{profile}','ProfilesController@show');
//Route::get('/{profile}/edit',array('as'=>'profile.edit','uses'=>'ProfilesController@edit'));
//Route::post('/{profile}/edit',array('as'=>'profile.edit','uses'=>'ProfilesController@update'));


//Route::resource('profile','ProfilesController',['only'=>['update','destroy','store']]);
    Route::get('admin/login',['as'=>'admin.login','uses'=>'SessionsController@create']);
    Route::resource('admin/sessions','SessionsController',['only'=>['create','store','destroy']]);

Route::group(array('prefix' => 'admin','before'=>'auth_admin'), function () {
    #Authendication
    Route::get('logout',['as'=>'admin.logout','uses'=>'SessionsController@destroy']);
    

    #Users
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
    Route::resource('teachers','TeachersController');
    Route::resource('classes','ClassesController');
    Route::resource('disablities','DisablitiesController');


});
