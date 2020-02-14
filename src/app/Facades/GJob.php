<?php


namespace Lightit\LaravelGoogleJobs\Facades;


use Illuminate\Support\Facades\Facade;
use Lightit\LaravelGoogleJobs\Contracts\GJobContract;

/**
 * GJob Facade
 * @package Lightit\LaravelGoogleJobs\Facades
 * @method static \Lightit\LaravelGoogleJobs\GJob fields(array $parameters)
 * @method static \Lightit\LaravelGoogleJobs\GJob withOptionals(array $parameters)
 * @method static string generate()
 */
class GJob extends Facade
{
    protected static function getFacadeAccessor() { return GJobContract::class; }
}
