<?php


namespace Lightit\LaravelGoogleJobs;

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
            'datePosted' => 'required|date',
            'text' => 'required|string',
            'hiringOrganization' => 'required|array',
            'jobLocation' => 'required|array',
            'title' => 'required|string',
            'validThrough' => 'required|date'
        ];
    }

    /**
     * @param array $dataToValidate
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function make(array $dataToValidate): \Illuminate\Contracts\Validation\Validator
    {
        return \Illuminate\Support\Facades\Validator::make($dataToValidate, $this->rules());
    }
}
