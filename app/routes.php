<?php
#home

Route::get('test',function(){
	$user = User::whereEmail("test123@gmail.com")->firstOrFail();
	$result = $user->sentry()->update([
		'password'=>'asdasd'
	]);
	return dd($result);
	$user = Sentry::findUserByEmail('test123@gmail.com');
	return dd($user);


});
Route::get('/',['as'=>'home','uses'=>'\Frontend\PagesController@home']);
Route::post('dang-ki',['uses'=>'\Frontend\MembersController@storeMember']);
Route::get('facebooklogin',['as'=>'facebook_login','uses'=>'\Frontend\MembersController@facebookLogin']);

Route::get('facebook/logout',function(){
    return "Log";
});
Route::get('facebook/login',function(){

});
Route::post('dang-nhap',['uses'=>'\Frontend\SessionsController@store']);

Route::group(['before'=>'auth'],function(){
    Route::get('dashbroad','\Frontend\PagesController@dashbroad');
    Route::get('thoi-khoa-bieu','\Frontend\PagesController@schedules');
    Route::get('dang-xuat','\Frontend\SessionsController@destroy');

    Route::get('student-profile','\Frontend\PagesController@student_profile');
});
Route::get('quen-mat-khau',['uses'=>'\Frontend\SessionsController@forgotPassword']);
Route::post('reset-password',['uses'=>'\Frontend\SessionsController@resetsutPassword']);
Route::get('member/{member_id}/resetpassword/{resetCode}/{new_password}',['uses'=>'\Frontend\SessionsController@processResetPassword']);



Route::get('admin',['as'=>'admin','uses'=>'AdminPagesController@index'])->before('auth_admin');
Route::get('admin/notice',['as'=>'admin.notice','uses'=>'AdminPagesController@notice']);

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
    Route::get('class/{class_id}/remove-student/{student_id}',['as'=>'admin.classes.removestudent','uses'=>'ClassesController@removestudent']);
    Route::post('class/{class_id}/add-subject',['as'=>'admin.classes.addsubject','uses'=>'ClassesController@add_subject']);
    Route::get('class/{class_id}/remove-subject/{subject_id}',['as'=>'admin.classes.removesubject','uses'=>'ClassesController@remove_subject']);

    Route::resource('classes','ClassesController');
    Route::resource('classes.schedules','ClassSchedulesController');
    Route::get('schedules/delete/{id}',['as'=>'admin.classes.schedules.delete','uses'=>'ClassSchedulesController@destroy']);


    Route::resource('courses','CoursesController');
    Route::resource('disablities','DisablitiesController');

    Route::resource('subjects','SubjectsController');

    Route::get('ajax/changelog',['as'=>'admin.ajax.changelog','uses'=>'AjaxController@changelog']);


});
