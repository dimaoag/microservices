<?php

namespace App\Providers;

use App\Models\User\User;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot(): void
    {
        $this->registerPolicies();
        $this->registerPermissions();

        Passport::routes();
    }

    private function registerPermissions(): void
    {
        Gate::define('view', function (User $user, string $permission) {
            return $user->isHasAccess("view_{$permission}") || $user->isHasAccess("edit_{$permission}");
        });

        Gate::define('edit', function (User $user, string $permission) {
            return $user->isHasAccess("edit_{$permission}");
        });
    }
}
