<?php
	
	function lang( $phrase ){

		static $lang = array(
			
// Navbar Links

			'HOME_ADMIN' 	=> 'CAR SHOPE',
			'NEW_CARS' 	    => 'New Cars',
			'USED_CARS' 	=> 'Used Cars',
			'MEMBERS' 		=> 'Members',		
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => ''
		);

		return $lang[ $phrase ];

	}