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

    /**
     * Return a basic Job Offer Array
     * @return array
     */
    protected function basicJobOffer(): array
    {
        return [
            'datePosted' => '2016-02-18',
            'hiringOrganization' => [
                '@type' => 'Organization',
                'name' => 'Test company',
                'sameAs' => 'https://google.com',
                'logo' => 'https://google.com'
            ],
            'jobLocation' => [
                '@type' => 'Place',
                'streetAddress'=> '555 Clancy St',
                'addressLocality'=> 'Detroit',
                'addressRegion'=> 'MI',
                'postalCode'=> '48201',
                'addressCountry'=> 'US'
            ],
            'title' => 'Software Engineer',
            'validThrough' => '2017-03-18T00:00'
        ];
    }
}
