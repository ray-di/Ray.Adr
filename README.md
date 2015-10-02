# Ray.Adr

## Radar.Adr with Ray.Di

This is unofficial **experimental** subpackage for [Radar.Adr](https://github.com/radarphp/Radar.Adr) to replace DI library from [Aura.Di](https://github.com/auraphp/Aura.Di) to [Ray.Di](https://github.com/ray-di/Ray.Di) .

## Installing Ray.Adr

```
composer create-project -s dev radar/project example-project
cd example-project
composer require ray/adr
mkdir tmp
cp vendor/ray/adr/web/index.php web/index.php
php -S localhost:8080 -t web
```
