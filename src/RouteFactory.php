<?php
namespace Ray\Adr;

use Aura\Router\Route;

class RouteFactory
{
    public function __invoke()
    {
        return new Route();
    }
}