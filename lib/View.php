<?php
/**
 * Created by PhpStorm.
 * User: Ростислав
 * Date: 11.03.2018
 * Time: 21:44
 */

namespace lib;


class View
{
    private $data  = [];
    private $path;

    public function __construct($controller = '', $action = '')
    {
        if ($controller && $action)
        {
            $this->path = "../view/$controller/$action.php";
        }
        $this->path = "../view/controller/$action.php";
    }

    public function render($data, $path = null)
    {
        if ($path)
        {
            $this->path = $path;
        }
        if (!file_exists($this->path))
        {
            throw new \Exception("View {$this->path} not found.");
        }
        ob_start();
        include $file;
        return ob_get_clean();
    }
}