# Seasonal 

Seasonal is a library to detect the current season (summer, winter, fall..etc).
It also detects if you are in the southern or northern hemisphere and adjusts the date ranges accordingly.

## Install

Via Composer

``` bash
$ composer require letsgolearn/seasonal
```

## Usage

```php
    $location = new Location(new GeoIp, new SeasonalDateRanges);
    $seasonal = new Seasonal($location);
    
    $seasonal->get(); // => WINTER
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover any security related issues, please email ryan@letsgolearn.com instead of using the issue tracker.

## Authors

- [Ryan Shofner][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/ryun