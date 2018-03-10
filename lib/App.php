<?php
namespace lib;
use Router;

class App
{

    public function run($params)
    {
        $router = new Router();

//$router->parseUrl($_SERVER['REQUEST_URI']);
        $router->parseUrl($params);
        $controllerName = ucfirst($router->getController()) . 'Controller';
        $actionName     = $router->getAction() . 'Action';
        $params         = $router->getParams();

        $controllerName = "controller\\$controllerName";
        $controller = new $controllerName();

        return $controller->$actionName($params);
    }
}