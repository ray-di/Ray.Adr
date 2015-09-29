<?php
namespace Ray\Adr\Module;

use Aura\Router\RouterContainer;
use Ray\Di\ProviderInterface;

class MatcherProvider implements ProviderInterface
{
    private $routerContainer;

    public function __construct(RouterContainer $routerContainer)
    {
        $this->routerContainer = $routerContainer;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return $this->routerContainer->getMatcher();
    }
}
