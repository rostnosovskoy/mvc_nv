<?php

class Router
{
    protected $controller;
    protected $action;
    protected $params;

    public function parseUrl($uri)
    {
//        print_r(explode("/", $uri['r']));
        list($this->controller, $this->action) = explode("/", $uri['r']);
        $this->params = $uri;
    }
    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }



}