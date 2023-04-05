<?php

namespace Technodrive\Router\Listener;

use Technodrive\Core\Interface\ListenerInterface;
use Technodrive\Core\Request;
use Technodrive\Core\Uri;
use Technodrive\Process\Process;
use Technodrive\Router\Router;

class RouterListener implements ListenerInterface
{
    protected Uri $uri;
    protected Router $router;
    protected Process $process;

    public function __construct(Process $process, Router $router)
    {
        $this->process = $process;
        $this->router = $router;
    }

    public function call()
    {
       $this->router->mockRoute();
    }
}