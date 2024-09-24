# Paisa: Seamless Multi-Gateway Payment Streaming for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/manza/paisa.svg?style=flat-square)](https://packagist.org/packages/manza/paisa)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/manza/paisa/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/manza/paisa/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/manza/paisa/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/manza/paisa/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/manza/paisa.svg?style=flat-square)](https://packagist.org/packages/manza/paisa)

Paisa is a powerful, intuitive Laravel package that simplifies multi-gateway payment processing. With its fluent API, Paisa allows developers to effortlessly integrate and manage various payment gateways like Stripe, PayPal, and GoCardless. This package provides a unified, expressive interface for handling payments, authorizations, captures, refunds, and more.

## Key features:

- Fluent, chainable API for clear and concise payment logic
- Easy integration with multiple payment gateways
- Consistent interface across different payment providers
- Built-in support for common payment operations
- Extensible architecture for adding new gateways
- Laravel-friendly design with easy configuration

Streamline your payment processing with Paisa and experience the flow of effortless transactions in your Laravel applications.
## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/paisa.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/paisa)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require manza/paisa
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="paisa-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="paisa-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="paisa-views"
```

## Usage

```php
$paisa = new Manza\Paisa();
echo $paisa->echoPhrase('Hello, Manza!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Muhammad Ali Shah](https://github.com/ali)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
