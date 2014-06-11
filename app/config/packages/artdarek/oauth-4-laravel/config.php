<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '253066224893576',
            'client_secret' => '095d09167e8e3551de51a870ac5e90cd',
            'scope'         => array('email','user_about_me','user_friends','user_birthday','user_hometown','user_location'),
        ),		

	)

);