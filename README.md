# Laravel Scout Elasticsearch Driver

This package provides a [Elasticsearch](https://www.elastic.co/products/elasticsearch) driver for Laravel Scout.

## Contents

- [Installation](#installation)
- [Usage](#usage)
- [Credits](#credits)
- [License](#license)

## Installation

You can install the package via composer:

```bash
composer require sohamgreens/laravel-scout-elastic
```

Laravel will automatically register the driver service provider.

#### Install elasticsearch-php client

For use this library we recomend using the latest version at this time `(^7.9)`

```bash
composer require elasticsearch/elasticsearch
```

### Setting up Elasticsearch configuration

After you've published the Laravel Scout package configuration, you need to set your driver to `elasticsearch` and add its configuration:

```php
// config/scout.php
...
    // Set your driver to elasticsearch
    'driver' => env('SCOUT_DRIVER', 'elasticsearch'),
...
    /*
    |--------------------------------------------------------------------------
    | Elasticsearch Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your Elasticsearch settings.
    |
    */
    'elasticsearch' => [
        'hosts' => [
            env('ELASTICSEARCH_HOST', 'localhost'),
            // [
            //     'host'   => env('ELASTICSEARCH_HOST', 'localhost'),
            //     'port'   => env('ELASTICSEARCH_PORT', '9200'),
            //     'scheme' => env('ELASTICSEARCH_SCHEME', 'https'),
            //     'path'   => env('ELASTICSEARCH_PATH', '/elastic'),
            //     'user'   => env('ELASTICSEARCH_USER', 'username'),
            //     'pass'   => env('ELASTICSEARCH_PASS', 'password'),
            // ]
        ],
    ]
...
```

For host configuration you can refer to the official [Elasticsearch documentation](https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html)

## Usage

Now you can use Laravel Scout as described in the [Laravel Scout official documentation](https://laravel.com/docs/8.x/scout)

## Limitations

**Identifying Users**
Currrently user identification is not supported.

## License

The MIT License (MIT).
