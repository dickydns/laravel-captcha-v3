# GOOGLE CAPTCHA V3 LARAVEL 7  PNP BOSS
> GOOGLE CAPTCHA V3 LARAVEL 7
silahkan lapor jika ada bug atau masukan



## Installation
Install dengan Composer

```sh
composer require dickyp/captcha
```

### Tambahkan

#### Provider:
```sh
Dickyp\Captcha\CaptchaPackageServiceProvider::class,
```

#### aliases:
```sh
'Captcha' => Dickyp\Captcha\CaptchaFacade::class,
```
#### API TOKEN


setelah itu lakukan.
```sh
php artisan vendor:publish

dalam folder laravel-project/config/config/captcha.php

pindahkan captcha.php ke folder laravel-project/config/ 
```

atau membuat manual file config dengan nama captcha.php pada laravel-project/config

```sh
return [
'secret' => env('CAPTCHA_SECRET', 'token'),
'site' 	 => env('CAPTCHA_SITEKEY', 'token')
];
```

dalam file .env tambahkan 

```sh
CAPTCHA_SECRET=token
CAPTCHA_SITEKEY=token
```



## Usage example

untuk menggunakan tambahkan.

```sh
use Captcha;
```

pada halaman html yang akan di gunakan captcha tambahkan

untuk sitekey bisa di selipkan pada controller contohnya

```sh
$data =  array('sitekey' => env('CAPTCHA_SITEKEY'));
return view('welcome')->with($data);
```


tambahkan pada form 

```sh
<form id="id_form">
    @csrf
    <input type="hidden" name="recaptcha" id="recaptcha">
</form>
```


tambahkan sebelum </body>

```sh
    <script src="https://www.google.com/recaptcha/api.js?render={{ $sitekey }}"></script>
    <script>
        grecaptcha.ready(function() {
             grecaptcha.execute('{{ $sitekey }}', {action: 'id_form'}).then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
        });
    </script>
```

untuk melakukan validasi captcha tambahkan

```sh
$captcha = Captcha::captcha_check(request('recaptcha'));
if ($captcha->score >= 0.3 && $captcha->success == true) {
 //jika captcha valid 
} else{
//jika captcha tidak valid
}
```


## Release History

* V 1.0 
    * Upload fitur dasar.




