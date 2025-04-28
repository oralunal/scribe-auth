# Scribe Auth Middleware

A Laravel middleware package that adds authentication protection to your Scribe API documentation. This package provides a simple way to secure your API documentation with basic authentication, ensuring that only authorized users can access your API documentation pages.

## Installation

1. Install the package via Composer:

```bash
composer require oralunal/scribe-auth
```

2. Add the `web` and `scribe.auth` middleware to your `config/scribe.php` file:

```php
'middleware' => [
    // ...
    'web',
    'scribe.auth',
],
```

3. Publish the configuration file:

```bash
php artisan vendor:publish --tag=scribe-auth-config
```

## Configuration

The package comes with a config file (`config/scribe-auth.php`) where you can customize the following settings:

- `SCRIBE_AUTH_ENABLED`: Enable/disable the middleware (Default: `false`)
- `SCRIBE_AUTH_PASSWORD`: Authentication password (Default: `1234567890`)

Add the following environment variable to your `.env` file:

```env
SCRIBE_AUTH_ENABLED=true
SCRIBE_AUTH_PASSWORD=your_fantastic_password
```

## Security

- Use different credentials in production
- Choose a strong password
- Keep your credentials secure

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).