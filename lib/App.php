<?php
namespace lib;

class App
{
    public function __construct()
    {
        set_exception_handler(function($e){
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

        $lang = new Lang();
        $lang->load($router->getLang());

        $controllerName = "controller\\$controllerName";

        /** @var Controller $controller */
        $controller = new $controllerName();
        $controller->$actionName($params);
        //---------------------- innner view --------------
        $innerView = new View( $router->getController(), $router->getAction() );
        $innerData = $controller->getData();
        $innerData['lang'] = $lang;

        $content = $innerView->render($innerData, $path);

        $view = new View();
        $data = ['content' => $content];

        return $view->render($data, "../view/{$router->getRoute()}.php");


    }
}