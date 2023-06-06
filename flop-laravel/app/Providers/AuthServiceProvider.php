<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(GateContract $gate): void
    {
        $this->registerPolicies($gate);

        $gate->define('isAdmin', function ($user) {
            return $user->groups()->where('name', 'admin')->exists();
        });

        $gate->define('isUser', function ($user) {
            return $user->groups()->where('name', 'user')->exists();
        });
    }
}
