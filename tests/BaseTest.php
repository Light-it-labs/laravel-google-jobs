<?php


namespace Lightit\LaravelGoogleJobs\Tests;

use Lightit\LaravelGoogleJobs\Providers\LaravelGoogleJobsServiceProvider;
use Orchestra\Testbench\TestCase;

class BaseTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [LaravelGoogleJobsServiceProvider::class];
    }
}
