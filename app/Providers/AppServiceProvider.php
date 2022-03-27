<?php

namespace App\Providers;

/* use Illuminate\Support\Carbon; */
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
USE Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
         }
         Carbon::setUTF8(true); 
        Carbon::setLocale('es');  ##Determinamos el idioma español
        setlocale(LC_TIME, 'es_ES');
        ##setlocale(LC_TIME, 'es_ES.utf8');   esta opción resume las dos anteriores

    }
}
