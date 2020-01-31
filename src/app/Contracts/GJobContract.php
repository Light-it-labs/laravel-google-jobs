<?php


namespace Lightit\LaravelGoogleJobs\app\Contracts;

use Lightit\LaravelGoogleJobs\app\GJob;

/**
 * This contract defines how GJob class is going to work
 * Interface GJobContract
 * @package Lightit\LaravelGoogleJobs\app\Contracts
 */
interface GJobContract
{
    /**
     * Set the required Google Jobs parameters
     *
     * @see https://developers.google.com/search/docs/data-types/job-posting
     * @param array $parameters
     * @return GJob
     */
    public function fields(array $parameters): GJob;

    /**
     * Set optional Google Jobs parameters
     *
     * @see https://developers.google.com/search/docs/data-types/job-posting
     * @param array $parameters
     * @return GJob
     */
    public function withOptionals(array $parameters): GJob;

    /**
     * Generates a json string with the desired google jobs format
     *
     * @param array $parameters
     * @return string
     */
    public function generate(array $parameters): string;
}
