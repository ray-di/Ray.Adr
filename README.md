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
mkdir tmp
```
edit web/index.php

```php
<?php
use josegonzalez\Dotenv\Loader as Dotenv;
use Ray\Adr\Boot; // change here
use Relay\Middleware\ExceptionHandler;
use Relay\Middleware\ResponseSender;
use Zend\Diactoros\Response as Response;
use Zend\Diactoros\ServerRequestFactory as ServerRequestFactory;

/**
 * Bootstrapping
 */
require '../vendor/autoload.php';

Dotenv::load([
    'filepath' => dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env',
    'toEnv' => true,
]);

$boot = new Boot(dirname(__DIR__) . '/tmp'); // change here
$adr = $boot->adr();

/**
 * Middleware
 */
$adr->middle(new ResponseSender());
$adr->middle(new ExceptionHandler(new Response()));
$adr->middle('Radar\Adr\Handler\RoutingHandler');
$adr->middle('Radar\Adr\Handler\ActionHandler');

/**
 * Routes
 */
$adr->get('Hello', '/{name}?', function (array $input) {
        $payload = new Aura\Payload\Payload();
        return $payload
            ->setStatus($payload::SUCCESS)
            ->setOutput([
                'phrase' => 'Hello ' . $input['name']
            ]);
    })
    ->defaults(['name' => 'world']);

/**
 * Run
 */
$adr->run(ServerRequestFactory::fromGlobals(), new Response());
```
run 

```
cd web
php index.php // {"phrase":"Hello world"}
```
