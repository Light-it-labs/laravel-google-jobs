# Laravel Google Job Posting Metadata Generator
[![Build Status](https://travis-ci.com/Light-it-labs/laravel-google-jobs.svg?branch=master)](https://travis-ci.com/Light-it-labs/laravel-google-jobs)

This package allows you to generate the required metadata for Google Jobs Announcements in a easy and Laravel way.

## Installation
You can install this package via composer
`composer require lightit/laravel-google-jobs`

The service provider will be auto discovered and then automatically added to your providers array.

## Usage
Laravel Google Jobs provides two different ways of json generation:

1) You can use the `GJob` facade available at:
`Lightit\LaravelGoogleJobs\Facades` namespace

2) You can use Laravel's dependency injection system. From your class constructor, inject the `GJobContract`. This will return a singleton instance
of `Lightit\LaravelGoogleJobs\GJob` class.

```php
use Lightit\LaravelGoogleJobs\Contracts\GJobContract;

class JobOfferController extends Controller
{
    /* @var GjobContract */
    private $gjob;

    public function __construct(GJobContract $gjob)
    {
        // $this->gjob is now a GJob class singleton instance
        $this->gjob = $gjob;
    }

}
```

## Available API
Google Job Posting allows a specific set of fields for your jobs. Check: https://developers.google.com/search/docs/data-types/job-posting for more information.

Some of these fields are required, and others are optional. This package will help you through the
process of generating and validating all this data properly, so you don't have to care about the formatting or the definitions of the JSON.

#### Methods
`$this->gjob->fields(array $parameters): GJob`

This method adds all `array $parameters` into your current instance and performs data validations.
If one of the required parameters is missing from the array a`Lightit\LaravelGoogleJobs\Exceptions\FieldsValidationsException` will be thrown specifying the missing required fields.

-----

`$this->gjob->withOptionals(array $parameters): GJob`

As the name says, this method adds all `array $parameters` into your current instance, performing data validations. Only format validations are performed over these fields.


-----

`$this->gjob->generate(): string`

Generates the proper JSON format and validates all the instance parameters.

## Example
```php
public function show(Request $request, $id)
{
    // Lets say we want to allow google to render our job offer

    // Cool! Is time to do some magic with this package, we are going to use the Facade for this example
     // All You have to do is create an array like this one.
      // We strongly recomend the use of a model accessor in order to avoid duplicated code and provide one single source of truth for your job offer array representation
    $jobArray = [
        'datePosted' => '...',
        'text' => '...',
        'hiringOrganization' => [
            '@type' => '...',
            'name' => '...',
            'sameAs' => '...',
            'logo' => '...'
        ],
        'jobLocation' => [
            '@type' => '...',
            'streetAddress'=> '...',
            'addressLocality'=> '...',
            'addressRegion'=> '...',
            'postalCode'=> '...',
            'addressCountry'=> '...'
        ],
        'title' => '...',
        'validThrough' => '...'
    ];

    // Add your array into the singleton instance
    GJob::fields($jobArray);

    return view('details');
}
```

Now, all you have to do is call to the `generate()` method directly on your view before you close the `</body>`  tag

```php
.
.
.
.

<p>I'm the best job offer ever!</p>

<script type="application/ld+json">
    {!! GJob::generate() !!}
</script>

</body>
```

And voila! A beautiful and fully compatible JSON is rendered for you.

## About Lightit
[Light-it](https://lightit.io) is a digital product development studio with offices in the US, Uruguay and Paraguay.

<img src="https://avatars1.githubusercontent.com/u/39625568?s=200&v=4" width="48">

## License
This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
