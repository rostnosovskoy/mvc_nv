<?php
/**
 * Created by PhpStorm.
 * User: Ростислав
 * Date: 10.03.2018
 * Time: 14:25
 */
namespace controller;

class PageController
{
    public function staticAction($params = [])
    {
        $id = $params['id'];
        $path = "../view/pages/$id.php";

        if (!file_exists($path))
        {
            throw new \Exception("File $path doesn't exist.");
        }

        return file_get_contents($path);
    }
}