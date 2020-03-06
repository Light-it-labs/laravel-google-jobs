<?php


namespace Lightit\LaravelGoogleJobs\Exceptions;


class WrongParameterException extends \Exception
{
    function __construct(string $wrongParameterKey)
    {
        parent::__construct("${wrongParameterKey} is not a valid attribute");
    }
}
