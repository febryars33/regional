# Indonesian Regional

[![Latest Version on Packagist](https://img.shields.io/packagist/v/snairbef/regional.svg?style=flat-square)](https://packagist.org/packages/snairbef/regional)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/febryars33/regional/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/snairbef/regional/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/febryars33/regional/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/snairbef/regional/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/snairbef/regional.svg?style=flat-square)](https://packagist.org/packages/snairbef/regional)

Indonesian Regional Dependency adalah package Laravel yang dirancang untuk mempermudah pengelolaan data wilayah Indonesia, seperti provinsi, kabupaten/kota, kecamatan, hingga kelurahan. Package ini menyediakan model siap pakai, relasi bawaan, serta fungsi untuk mengimpor data wilayah ke dalam database Anda menggunakan file CSV yang disertakan (provinces.csv, regencies.csv, districts.csv, sub_districts.csv).

Penggunaannya sederhana dan intuitif, menyerupai penggunaan model bawaan Laravel. Anda cukup memanggil model seperti `Snairbef\Regional\Models\Province` atau `Snairbef\Regional\Models\Regency`, lengkap dengan dukungan untuk Repository Pattern melalui interface yang dapat langsung diinject ke dalam controller Anda.

<!-- ## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/:package_name.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/:package_name)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards). -->

## Installation

You can install the package via composer:

```bash
composer require snairbef/regional
```

Now you can install the package to Laravel Project:

```bash
php artisan regional:install
```

You can run the migrations with:

```bash
php artisan migrate
```

You can import data from the csv that we have provided:
```bash
php artisan regional:import
```

<!-- This is the contents of the published config file:

```php
return [
];
``` -->

## Usage (Model)

```php
use Snairbef\Regional\Models\Province;

$province = Province::with(['regencies']);
dd($province->get());

or

$province = Province::search('Jawa');
dd($province);
```

## Usage (Repository)

```php
use Illuminate\Routing\Controller;
use Snairbef\Regional\Contracts\Repositories\ProvinceRepository;

class YourController extends Controller
{
    public function __construct(
        protected ProvinceRepository $province
    ) {}

    public function index()
    {
        $province = $this->province->with(['regencies']);
        dd($province->get());

        or

        $province = $this->province->search('Jawa');
        dd($province);
    }
}

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

- [Febriansyah Riki Setiadi](https://github.com/febryars33)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
