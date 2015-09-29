# Ray.Adr

## Radar.Adr with Ray.Di

This is unofficial **experimental** subpackage for [Radar.Adr](https://github.com/radarphp/Radar.Adr). You can choose DI library either [Aura.Di](https://github.com/auraphp/Aura.Di) or [Ray.Di](https://github.com/ray-di/Ray.Di) with this package.

## Install

```
composer require ray/adr
```

## Usage

To use [Ray.Di](https://github.com/ray-di/Ray.Di), Replace `use Radr\Adr\Boot;` to `use Ray\Adr\Boot;` in boot script.

```php
use Ray\Adr\Boot;
$boot = new Boot; // this objcet holds Ray.Di injector. Objects will be instatiated with Ray.Di.

```
