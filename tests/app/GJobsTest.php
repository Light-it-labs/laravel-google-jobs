<?php


namespace Lightit\LaravelGoogleJobs\Tests\app;

use Lightit\LaravelGoogleJobs\Exceptions\FieldsValidationException;
use Lightit\LaravelGoogleJobs\GJob;
use Lightit\LaravelGoogleJobs\Tests\BaseTest;

class GJobsTest extends BaseTest
{
    /** @var GJob */
    protected $gJob;

    protected function setUp(): void
    {
        parent::setUp();

        $this->gJob = $this->app->make('GJob');
    }

    /** @test
     * @throws FieldsValidationException
     */
    public function test_generate()
    {
        // Given
        $jobArray = [
            'datePosted' => '2016-02-18',
            'text' => 'lorem',
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
        //dd(\Lightit\LaravelGoogleJobs\Facades\GJob::fields($jobArray));
        $gJobObject = $this->gJob->fields($jobArray);


        // Performing
        $result = $gJobObject->generate();

        // Expect
        $this->assertEquals($result, json_encode($jobArray));
    }
}
