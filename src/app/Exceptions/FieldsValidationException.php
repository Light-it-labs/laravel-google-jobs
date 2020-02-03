<?php


namespace Lightit\LaravelGoogleJobs\Exceptions;


class FieldsValidationException extends \Exception
{
    function __construct($errors)
    {
        parent::__construct($errors);
    }
}
