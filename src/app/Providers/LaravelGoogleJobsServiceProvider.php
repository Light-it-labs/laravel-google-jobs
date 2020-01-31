<?php

namespace Lightit\LaravelGoogleJobs\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Lightit\LaravelGoogleJobs\Contracts\GJobContract;
use Lightit\LaravelGoogleJobs\GJob;

class LaravelGoogleJobsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [
        GJobContract::class => GJob::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
