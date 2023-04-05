<?php

namespace Technodrive\Router\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Core\Request;
use Technodrive\Process\Process;
use Technodrive\Process\ProcessManager;
use Technodrive\Router\Router;

class RouterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $processMgr = $container->get(ProcessManager::class);
        return new Router($processMgr->getProcess() );
    }
}