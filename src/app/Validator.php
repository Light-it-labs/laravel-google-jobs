<?php


namespace Lightit\LaravelGoogleJobs;

use Lightit\LaravelGoogleJobs\Exceptions\WrongParameterException;

/**
 * This Class will handle Google Jobs parameters validation
 *
 * Class Validator
 * @package Lightit\LaravelGoogleJobs
 */
class Validator
{

    /**
     * Validation rules
     *
     * @return array
     */
    private function rules(): array
    {
        return [
            '@context' => 'required',
            '@type' => 'required',
            'datePosted' => 'required|date',
            'hiringOrganization' => 'required|array',
            'jobLocation' => 'required|array',
            'title' => 'required|string',
            'validThrough' => 'required|date',
            'description' => 'nullable',
            'baseSalary' => 'nullable',
            'employmentType' => 'nullable'
        ];
    }

    /**
     * @param array $dataToValidate
     * @return \Illuminate\Contracts\Validation\Validator
     * @throws WrongParameterException
     */
    public function make(array $dataToValidate): \Illuminate\Contracts\Validation\Validator
    {
        // Check if $dataToValidate have only Google Job Announcements compatible keys
        foreach($dataToValidate as $key => $value) {
            if(! isset($this->rules()[$key])) {
                throw new WrongParameterException($key);
            }
        }

        return \Illuminate\Support\Facades\Validator::make($dataToValidate, $this->rules());
    }
}
