<?php

namespace Lightit\LaravelGoogleJobs\Providers;

use Illuminate\Support\ServiceProvider;
use Lightit\LaravelGoogleJobs\Contracts\GJobContract;
use Lightit\LaravelGoogleJobs\GJob;
use Lightit\LaravelGoogleJobs\Validator;

class LaravelGoogleJobsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GJob', function() {
            return new GJob(new Validator());
        });
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
