<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\ServiceProvider;
use Gate;
use Blade;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Permission::get()->map(function($permission) {
            Gate::define($permission->slug, function($user) use ($permission) {
                return $user->hasPermissionTo($permission);
            });
        });

        Blade::directive('hasRole', function($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) :";
        });

        Blade::directive('endHasRole', function($role) {
            return "<?php endif; ?>";
        });
    }
}
