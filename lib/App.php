<?php
namespace lib;

class App
{
    public function __construct()
    {
        Config::set('routes', [
           'default' => '',
           'admin' => 'admin_',
        ]);
    }

    public function run($params)
    {
//        $router = new Router();
        $router = new UriRouter();

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