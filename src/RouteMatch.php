<?php

namespace Technodrive\Router;

class RouteMatch
{

    protected string $routeName;
    protected string $controllerName;
    protected string $actionName;
    protected array $params;

    /**
     * @return string
     */
    public function getRouteName(): string
    {
        return $this->routeName;
    }

    /**
     * @param string $routeName
     * @return RouteMatch
     */
    public function setRouteName(string $routeName): RouteMatch
    {
        $this->routeName = $routeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @param string $controllerName
     * @return RouteMatch
     */
    public function setControllerName(string $controllerName): RouteMatch
    {
        $this->controllerName = $controllerName;
        return $this;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    /**
     * @param string $actionName
     * @return RouteMatch
     */
    public function setActionName(string $actionName): RouteMatch
    {
        $this->actionName = $actionName;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return RouteMatch
     */
    public function setParams(array $params): RouteMatch
    {
        $this->params = $params;
        return $this;
    }

}