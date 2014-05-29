<?php 

return array(
	'secret' => array(
		//put your app id and secret
		'appId'  => '250783585121840',
		'secret' => 'f751438390a1fb418114929f400bd602'
		),
	//Redirect after successfull login
	'redirect' => 'http://localhost:8000/facebook',
	//When Someone Logout from your Site
	'logout' => 'http://localhost:8000/facebook/logout',
	//you can add scope according to your requirement
	'scope' => 'user_birthday,email,user_hometown,user_location,user_status,user_photos,user_likes,user_education_history'
	);
