<?php
namespace Ray\Adr\Module;

use Aura\Router\Map;
use Aura\Router\Matcher;
use Aura\Router\RouterContainer;
use Aura\Router\Rule\RuleIterator;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Ray\Adr\Resolver;
use Ray\Adr\RouteFactory;
use Ray\Di\AbstractModule;
use Ray\Di\InjectionPoints;
use Ray\Di\Scope;
use Relay\RelayBuilder;

class AdrModule extends AbstractModule
{
    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->bind(RouterContainer::class)->toConstructor(
            RouterContainer::class,
            null,
            (new InjectionPoints)->addMethod('setRouteFactory', 'router_factory')
        )->in(Scope::SINGLETON);
        $this->bind(RelayBuilder::class)->toConstructor(
            RelayBuilder::class,
            'resolver'
        );
        $this->bind(Map::class)->toProvider(MapProvider::class);
        $this->bind(Matcher::class)->toProvider(MatcherProvider::class);
        $this->bind(RuleIterator::class)->toProvider(RuleIteratorProvider::class);
        $this->bind()->annotatedWith('resolver')->to(Resolver::class);
        $this->bind()->annotatedWith('router_factory')->toInstance(new RouteFactory);
        $this->bind(LoggerInterface::class)->to(NullLogger::class);
    }
}
