<?php
namespace lib;

class App
{
    public function __construct()
    {
        set_exception_handler(function(){
            echo "<div style='color: red;'>{$e->getMessage()}</div>";
            die;
        });

        require "../config/config.php";
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