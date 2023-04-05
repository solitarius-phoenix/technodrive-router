<?php

namespace Technodrive\Router;

use Technodrive\Core\Request;
use Technodrive\Core\Uri;
use Technodrive\Process\Process;
use Technodrive\Router\Exception\PageNotFoundException;

class Router
{
    protected Process $process;

    protected array $routes;

    public function __construct(Process $process)
    {
        $this->process = $process;
    }

    public function mockRoute()
    {
        $routeMatch = new RouteMatch();
        $routeMatch->setRouteName('mockRoute');
        $routeMatch->setActionName('index');
        $routeMatch->setControllerName('Application\Controller\MockController');
        $this->process->setRouteMatch($routeMatch);
    }

    protected function createRoutes(): void
    {

        die(var_dump($this->uri));
        $routes = $this->uri->getPath();
        foreach($routes as &$route) {
            //Make sure that we'll have one and only one slash before and after string
            $path = '/' . trim($route['path'], '/') . '/';
            preg_match_all('#\:([a-zA-Z0-9]*)\/#', $path, $matches);
            $route['get-keys'] = $matches[1];
            $pattern = '#^' . preg_quote($path) . '$#';
            $pattern = preg_replace('#\\\:([a-zA-Z0-9._-]*)\/#', '([a-zA-Z0-9._-]*)/', $pattern);
            $route['pattern'] = $pattern;
        }
        $this->routes = $routes;
    }

    public function route(): void
    {
        $uri = '/' . trim($this->request->getUri(), '/') . '/';
        foreach ($this->routes as $key=>$candidate) {
            if(preg_match($candidate['pattern'],$uri, $matches))
            {
                array_shift($matches);
                $gets = [];
                if( count($candidate['get-keys']) > 0 ) {
                    $gets = array_combine($candidate['get-keys'], $matches);
                }
                $this->request->setGetData($gets);
                $this->request->setRouteMatched($key);
                $this->request->setRouteData($candidate);
                return;
            }
        }

        // route not found throw an error catchable
        throw new PageNotFoundException('Page not found');

    }
}