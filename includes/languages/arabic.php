<?php
	
	function lang( $phrase ){
		static $lang = array(
			'MESSAGE' => 'Merhab in Arabic',
			'ADMIN' => 'Admin in Arabic'



		);
		return $lang[$phrase];

	}

