<?php
namespace Ray\Adr\Module;

use Aura\Router\RouterContainer;
use Ray\Di\ProviderInterface;

class RuleIteratorProvider implements ProviderInterface
{
    private $routerContainer;

    public function __construct(RouterContainer $routerContainer)
    {
        $this->routerContainer = $routerContainer;
    }

    public function get()
    {
        return $this->routerContainer->getRuleIterator();
    }
}
