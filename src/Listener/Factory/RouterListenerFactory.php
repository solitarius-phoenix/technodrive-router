<?php

namespace Technodrive\Router\Listener\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Process\ProcessManager;
use Technodrive\Router\Listener\RouterListener;
use Technodrive\Router\Router;

class RouterListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container): RouterListener
    {
        $process = $container->get(ProcessManager::class)->getProcess();
        $router = $container->get(Router::class);
        return new RouterListener($process, $router);
    }
}