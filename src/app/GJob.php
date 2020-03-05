<?php


namespace Lightit\LaravelGoogleJobs;


use Lightit\LaravelGoogleJobs\Contracts\GJobContract;
use Lightit\LaravelGoogleJobs\Exceptions\FieldsValidationException;

/**
 * Class GJob
 * @package Lightit\LaravelGoogleJobs\app
 */
class GJob implements GJobContract
{
    /** @var string */
    const CONTEXT = 'http://schema.org';
    /** @var string */
    const JOB_POSTING_TYPE = 'JobPosting';

    /** @var Validator */
    private $validator;

    /** @var array */
    private $requiredFields;

    /** @var array */
    private $optionalFields;

    /**
     * GJob constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->requiredFields = [];
        $this->optionalFields = [];
    }

    /**
     * @inheritDoc
     */
    public function fields(array $parameters): GJob
    {
        // Set default parameters
        $parameters['@context'] = self::CONTEXT;
        $parameters['@type'] = self::JOB_POSTING_TYPE;

        $this->requiredFields = $parameters;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function withOptionals(array $parameters): GJob
    {
        $this->optionalFields = $parameters;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws FieldsValidationException
     */
    public function generate(): string
    {
        $googleJobData = array_merge($this->requiredFields, $this->optionalFields);
        $validator = $this->validator->make($googleJobData);

        if($validator->fails()) {
            throw new FieldsValidationException($validator->errors());
        }

        return json_encode($googleJobData);
    }
}
