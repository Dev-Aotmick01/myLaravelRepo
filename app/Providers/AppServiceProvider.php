<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Password::defaults(function () {
            $theRules = Password::min(3)->mixedCase()->numbers()->symbols();
            return $this->app->isProduction() ? $theRules->uncompromised() : $theRules;

//            if($this->app->isProduction()){
//                return $theRules->uncompromised();
//            }else{
//                return $theRules;
//            }

//            return Password::min(3)
//                ->mixedCase()
//                ->numbers()
//                ->symbols()
//                ->uncompromised();
        });
        Paginator::useBootstrapFive();

    }
//    }
}
