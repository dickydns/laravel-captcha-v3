<?php 
return [
	'secret' => env('CAPTCHA_SECRET', 'token'),
    'site' 	 => env('CAPTCHA_SITEKEY', 'token')
];