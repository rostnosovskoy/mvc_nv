<?php
//use \lib\Router;
use controller\PageController;


//require_once "../lib/autoload.php";
include "../controller/PageController.php";
require_once "../lib/Router.php";
include "../lib/App.php";

$params = $_GET;
$app = new \lib\App();
$output = $app->run($params);
echo $output;
