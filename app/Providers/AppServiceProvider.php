<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // gate for post create
        Gate::define('post.create', function (User $user) {
            return ($user->role === 'admin' || $user->role === 'normal_user');
        });

        //gate for post delete
        Gate::define('post.delete', function (User $user, $post) {
            return $user->role === 'admin' || $user->id === $post->user_id;
        });
    }

    
}
