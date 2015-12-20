<?php
use josegonzalez\Dotenv\Loader as Dotenv;
use Ray\Adr\Boot;
use Relay\Middleware\ExceptionHandler;
use Relay\Middleware\ResponseSender;
use Zend\Diactoros\Response as Response;
use Zend\Diactoros\ServerRequestFactory as ServerRequestFactory;

/**
 * Bootstrapping
 */
require '../vendor/autoload.php';

use Aura\Payload_Interface\PayloadStatus;

Dotenv::load([
    'filepath' => dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env',
    'toEnv' => true,
]);

$boot = new Boot(dirname(__DIR__) . '/tmp');
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
            ->setStatus(PayloadStatus::SUCCESS)
            ->setOutput([
                'phrase' => 'Hello ' . $input['name']
            ]);
    })
    ->defaults(['name' => 'world']);

/**
 * Run
 */
$adr->run(ServerRequestFactory::fromGlobals(), new Response());
