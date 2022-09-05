<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        // Gate::define('modify-post', function(User $user, Blog $post){
        //    return $post->user_id == $user->id;
        // });

        Gate::define('modify-post', [PostPolicy::class, 'modifyPost']);
        Gate::define('delete-post', [PostPolicy::class, 'deletePost']);

        Gate::define('delete-user', [UserPolicy::class, 'deleteUser']);

        //
    }
}
