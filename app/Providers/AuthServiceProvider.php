<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Role;
Use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isMod', function (User $user) {
            $mod = Role::find(2);
            $roles = $user->roles;
            return $roles->contains('id', $mod->id);
        });

        Gate::define('isAdmin', function (User $user) {
            $mod = Role::find(1);
            $roles = $user->roles;
            return $roles->contains('id', $mod->id);
        });
    }
}
