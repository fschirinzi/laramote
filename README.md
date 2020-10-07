# Remote for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fschirinzi/laramote.svg?style=flat-square)](https://packagist.org/packages/fschirinzi/laramote)
[![Build Status](https://img.shields.io/travis/fschirinzi/laramote/master.svg?style=flat-square)](https://travis-ci.org/fschirinzi/laramote)
[![Quality Score](https://img.shields.io/scrutinizer/g/fschirinzi/laramote.svg?style=flat-square)](https://scrutinizer-ci.com/g/fschirinzi/laramote)
[![Total Downloads](https://img.shields.io/packagist/dt/fschirinzi/laramote.svg?style=flat-square)](https://packagist.org/packages/fschirinzi/laramote)

LaraMote allows you to run tasks in Laravel from remote. This package is helpful if you are testing
your frontend (SPA) application with [Cypress](https://www.cypress.io/) that uses a Laravel application as backend.

At the moment, these features are implemented:

:white_check_mark: Artisan command <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Command with parameters <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Get Output <br>
:white_check_mark: Login User <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Custom key value <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Custom key/table column <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Custom model <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Remember <br>
:white_check_mark: Factory <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Make/Create <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Models <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Name <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: States <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Amount <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Show hidden attributes <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :white_check_mark: Override attributes <br>

## Installation

You can install the package via composer:

```bash
composer require fschirinzi/laramote --dev
```

After installing LaraMote, you *may* publish its assets using the `laramote:install` Artisan command:

```bash
php artisan laramote:install
```

## Usage

LaraMote exposes the endpoints at the `/laramote` URI.
By default, you will only be able to access this dashboard in the `local` and `testing` environment.
However, within your `app/Providers/LaraMoteServiceProvider.php` file, there is a gate method
that controls access to the LaraMote endpoints in non-local environments.
You are free to modify this gate as needed to restrict access to your LaraMote endpoints:

``` php
/**
 * Register the LaraMote gate.
 *
 * This gate determines who can access LaraMote in non-local environments.
 *
 * @return void
 */
protected function gate()
{
    Gate::define('useLaraMote', function ($user = null) {
        return in_array(optional($user)->email, [
            //
        ]);
    });
}
```
## Upgrading

When upgrading to a new version of Laramote, you should re-publish LaraMote's assets:

```bash
php artisan laramote:publish
```

To keep the assets up-to-date and avoid issues in future updates, you may add the
laramote:publish command to the post-update-cmd scripts in your application's composer.json file:

## Customizing Middleware

If needed, you can customize the middleware stack used by LaraMote routes by updating your
`config/laramote.php` file. If you have not published LaraMote's configuration file, you may
do so using the vendor:publish Artisan command:

``` bash
php artisan vendor:publish --tag=laramote-config
```

Once the configuration file has been published, you may edit LaraMote's
middleware by tweaking the middleware configuration option within this file:

``` php
/*
|--------------------------------------------------------------------------
| LaraMote Route Middleware
|--------------------------------------------------------------------------
|
| These middleware will be assigned to every Vapor UI route - giving you
| the chance to add your own middleware to this list or change any of
| the existing middleware. Or, you can simply stick with this list.
|
*/

'middleware' => [
    'api',
    EnsureUserIsAuthorized::class,
],
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email fschirinzi25@gmail.com instead of using the issue tracker.

## Credits

- [Francesco Schirinzi](https://github.com/fschirinzi)
- [All Contributors](../../contributors)

I used the [Laravel/VaporUi](https://github.com/laravel/vapor-ui) package
and their [documentation](https://docs.vapor.build/1.0/introduction.html#installing-the-vapor-core)
as template to speed up the development of this package.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
