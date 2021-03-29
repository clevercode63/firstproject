<?php
	
	function lang( $phrase ){
		static $lang = array(
			'MESSAGE' => 'مرحباً بك ',
			'ADMIN' => 'مدير الموقع'



		);
		return $lang[$phrase];

	}

