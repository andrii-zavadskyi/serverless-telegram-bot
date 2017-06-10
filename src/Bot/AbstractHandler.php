<?php

namespace Bot;

use Raines\Serverless\Handler;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class AbstractHandler
 * @package Bot
 */
abstract class AbstractHandler implements Handler
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface $container
     * @return $this
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
}
