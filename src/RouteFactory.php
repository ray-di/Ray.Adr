<?php
namespace Ray\Adr;


use Radar\Adr\Route;

class RouteFactory
{
    public function __invoke()
    {
        return new Route();
    }
}
