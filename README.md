# Ray.Adr

## Radar.Adr with Ray.Di

This is unofficial **experimental** subpackage for [Radar.Adr](https://github.com/radarphp/Radar.Adr) to replace DI library from [Aura.Di](https://github.com/auraphp/Aura.Di) to [Ray.Di](https://github.com/ray-di/Ray.Di) .

## Install

```
composer require ray/adr
```

## Usage

To use [Ray.Di](https://github.com/ray-di/Ray.Di), Replace `use Radar\Adr\Boot;` to `use Ray\Adr\Boot;` in boot script.

```php
use Ray\Adr\Boot;
$boot = new Boot($tmpDir); // this objcet holds Ray.Di injector. Objects will be instatiated with Ray.Di.

```
### Try it now

```
composer create-project -s dev radar/project example-project
cd example-project
composer require ray/adr
// replace use Radar\Adr\Boot; to use Ray\Adr\Boot; in web/index.php
cd web
php index.php // {"phrase":"Hello world"}
```
