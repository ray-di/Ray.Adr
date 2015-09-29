<?php
namespace Ray\Adr\Module;

use Aura\Router\RouterContainer;
use Ray\Adr\Adr;
use Ray\Di\ProviderInterface;
use Relay\RelayBuilder;

class AdrProvider implements ProviderInterface
{
    private $routerContainer;

    private $relayBuilder;

    public function __construct(
        RouterContainer $routerContainer,
        RelayBuilder $relayBuilder
    ) {
        $this->routerContainer = $routerContainer;
        $this->relayBuilder = $relayBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return new Adr(
            $this->routerContainer->getMap(),
            $this->routerContainer->getRuleIterator(),
            $this->relayBuilder
        );
    }
}
