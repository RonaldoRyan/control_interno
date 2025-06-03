<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Services\AuthServices\AuthServices;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Student' => 'App\Policies\StudentPolicy',
        'App\Models\Professor' => 'App\Policies\ProfessorPolicy',
        'App\Models\OtherWorker' => 'App\Policies\OtherWorkerPolicy',
    ];


    public function register(): void
    {
        $this->app->singleton(AuthServices::class);
    }

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
