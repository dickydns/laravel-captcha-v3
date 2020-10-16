<?php
namespace Dickyp\Captcha;
use Exception;

Class Captcha{
    public function __construct(){
        $this->secret = config('captcha.secret');
        $this->site   = config('captcha.site');
    }

    function captcha_check($response){
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        
        $data = [
            'secret'    => $this->secret,
            'response'  => $response
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context    = stream_context_create($options);
        $result     = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);
        return $resultJson;
    }
}