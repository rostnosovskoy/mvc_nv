<?php
use lib\Router;
use lib\App;
use controller\PageController;

require_once "../lib/autoload.php";


//$params = $_GET;
$params = $_SERVER['REQUEST_URI'];
$app = new App();
$output = $app->run($params);
echo $output;
