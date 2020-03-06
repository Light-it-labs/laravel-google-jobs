<?php


namespace Lightit\LaravelGoogleJobs\Tests\app;

use Lightit\LaravelGoogleJobs\Exceptions\FieldsValidationException;
use Lightit\LaravelGoogleJobs\Exceptions\WrongParameterException;
use Lightit\LaravelGoogleJobs\GJob;
use Lightit\LaravelGoogleJobs\Tests\BaseTest;

class GJobsTest extends BaseTest
{
    /** @var GJob */
    protected $gJob;

    protected function setUp(): void
    {
        parent::setUp();

        $this->gJob = $this->app->make(GJob::class);
    }

    /** @test
     * @throws FieldsValidationException
     */
    public function test_generate()
    {
        // Given
        $jobArray = $this->basicJobOffer();

        $gJobObject = $this->gJob->fields($jobArray);

        // Performing
        $result = $gJobObject->generate();
        // Add @context and @type attributes to confirm if default insertion is working properly
        $jobArray['@context'] = GJob::CONTEXT;
        $jobArray['@type'] = GJob::JOB_POSTING_TYPE;

        // Expect
        $this->assertEquals($result, json_encode($jobArray));

        // Check if the default values are added
        $this->assertArrayHasKey('@context', json_decode($result, true));
        $this->assertArrayHasKey('@type', json_decode($result, true));
    }

    /**
     * @throws FieldsValidationException
     */
    public function test_misspelled_or_not_existing_fields_throws_an_exception()
    {
        $this->expectException(WrongParameterException::class);

        // Given
        $jobArray = $this->basicJobOffer();
        $jobArray['notValidKey'] = 'not valid value';

        $gJobObject = $this->gJob->fields($jobArray);

        // Performing
        $result = $gJobObject->generate(); // Should throw WrongParameterException
    }
}
