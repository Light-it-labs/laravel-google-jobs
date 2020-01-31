<?php


namespace Lightit\LaravelGoogleJobs;


use Lightit\LaravelGoogleJobs\Contracts\GJobContract;

/**
 * Class GJob
 * @package Lightit\LaravelGoogleJobs\app
 */
class GJob implements GJobContract
{
    /**
     * @inheritDoc
     */
    public function fields(array $parameters): GJob
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function withOptionals(array $parameters): GJob
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function generate(): string
    {
        return "";
    }
}
