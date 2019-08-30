## Laravel Contact Form
[![Total Downloads](https://poser.pugx.org/jtelesforoantonio/laravel-contact-form/downloads)](https://packagist.org/packages/jtelesforoantonio/laravel-contact-form)
[![License](https://poser.pugx.org/jtelesforoantonio/laravel-contact-form/license)](https://packagist.org/packages/jtelesforoantonio/laravel-contact-form)

This package is a simple contact form for laravel >=5.5, the form use Bootstrap 4.

## Installation

Install the package with Composer.

```shell
composer require jtelesforoantonio/laravel-contact-form
```

Laravel 5.5 uses Package Auto Discovery and you don't need to add the Service Provider manually.

## Usage

Once installed you need to run the migration command to create the table(contact_messages)
where the messages will be saved.
```shell
php artisan migrate
```

If you want to send a email notification of the contact message you need to publish the config file(contact_form).
```shell
php artisan vendor:publish --tag=laravel-contact-form-config
```

You can modify the HTML form template used.
```shell
php artisan vendor:publish --tag=laravel-contact-form-views
```

Also you can to change the translation of the contact form.
```shell
php artisan vendor:publish --tag=laravel-contact-form-translations
```

Call the contact route where you want.
```html
<a href="{{ route('contact') }}">Contact Us</a>
```
