<?php


namespace Lightit\LaravelGoogleJobs\Tests\app;

use Lightit\LaravelGoogleJobs\Contracts\GJobContract;
use Lightit\LaravelGoogleJobs\Tests\BaseTest;

class GJobsTest extends BaseTest
{
    /** @var GJobContract */
    protected $gJob;

    protected function setUp(): void
    {
        parent::setUp();

        $this->gJob = $this->app->make(GJobContract::class);
    }

    /** @test */
    public function test_generate()
    {
        // Given
        $gJobObject = $this->gJob->fields([
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
        ]);

        // Performing
        $result = $gJobObject->generate();

        // Expect
        $this->assertEquals(2, $result);
    }
}
