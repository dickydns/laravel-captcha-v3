<?php
 
namespace Dickyp\Captcha;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CaptchaPackageServiceProvider extends ServiceProvider{
    public function boot(){
        $this->publishes([
            __DIR__.'/config/captcha.php' => config_path('config/captcha.php'),
        ]);
    }


    public function register(){
        $this->app->singleton('captcha', function() {
            return true;
        });

        App::bind('captcha', function()
        {
            return new Captcha;
        });
    }
}
