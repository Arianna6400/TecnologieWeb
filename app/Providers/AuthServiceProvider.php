<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Utenti;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function (Utenti $user) {
            if ($user->role == 'Admin'){
                return true;
            }
            else{
                return false;
            }
        });

        Gate::define('isLocatore', function (Utenti $user) {
            //dd($user->role);
            //return $user->hasRole('Locatore');
            if ($user->role == 'Locatore'){
                return true;
            }
            else{
                return false;
            }
        });

        Gate::define('isLocatario', function (Utenti $user) {
            if ($user->role == 'Locatario'){
                return true;
            }
            else{
                return false;
            }
        });
    }
}
