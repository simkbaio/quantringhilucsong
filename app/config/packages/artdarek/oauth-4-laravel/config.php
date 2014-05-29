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
            'scope'         => array('email','public_profile','user_friends'),
        ),		

	)

);