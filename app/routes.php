<?php
#home
use \Carbon\Carbon;
Route::get('/',function(){
    return Redirect::to('admin');
});
Route::get('admin',['as'=>'admin','uses'=>'AdminPagesController@index'])->before('auth_admin');
Route::get('thuxem',function(){
    $curl = new MyCurl('https://api.github.com/repos/simkbaio/quantringhilucsong/commits');
    $result = $curl->execute();
    $result = json_decode($result);

    foreach($result as $r){
        return dd($r->commit->committer);
        echo $r->commit->message."<br/>";
    }
    return;
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
    Route::post('users/changepassword/{id}',['as'=>'admin.users.changepassword','uses'=>'UsersController@changepassword']);
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

    Route::post('class/{class_id}/addstudent',['as'=>'admin.classes.addstudent','uses'=>'ClassesController@addstudent']);
    Route::resource('classes','ClassesController');
    Route::resource('courses','CoursesController');
    Route::resource('disablities','DisablitiesController');
    Route::get('ajax/changelog',['as'=>'admin.ajax.changelog','uses'=>'AjaxController@changelog']);


});
