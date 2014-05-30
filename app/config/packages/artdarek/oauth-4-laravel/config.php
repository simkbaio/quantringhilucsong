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
            'client_id'     => '250783585121840',
            'client_secret' => 'f751438390a1fb418114929f400bd602',
            'scope'         => array('email','user_about_me','user_friends','user_birthday','user_hometown','user_location','user_photos'),
        ),		

	)

);