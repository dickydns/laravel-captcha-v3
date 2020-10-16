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

pindahkan rajaongkir.php ke folder laravel-project/config/ 
```

atau membuat manual file config dengan nama captcha.php

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



## Release History

* V 1.0 
    * Upload fitur dasar, ambil data kota, provinsi, ongkos kirim.




