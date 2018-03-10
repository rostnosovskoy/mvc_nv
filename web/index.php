<?php
//use lib\Router;
//use controller\PageController;

include "../lib/Router.php";

require_once "../lib/autoload.php";
require_once "../controller/PageController.php";

$router = new Router();

//$router->parseUrl($_SERVER['REQUEST_URI']);
$router->parseUrl($_GET);

$controllerName = $router->getController() . 'Controller';
$actionName     = $router->getAction();
$params         = $router->getParams();

$controller = new $controllerName();

$output = $controller->$actionName();

echo $output;