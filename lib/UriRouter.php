<?php
namespace lib;

class UriRouter extends Router
{
    const BASE_PATH = '/21/web';
    protected $route;
    protected $lang;

    public function parseUri($uri)
    {
        $uri = $this->cutBasePath();
        $uri = trim($uri, '/');

        $parse = explode('/', $uri);

        $route = $parse[0];

        $allowedRoutes = Config::get('routes');
        $allowedRoutes = array_keys($allowedRoutes);

        if (in_array($route, $allowedRoutes))
        {
            $this->route = $route;
        }
    }

    private function cutBasePath($path)
    {
        if (strpos($path, self::BASE_PATH) === 0)
        {
            $path = substr($path, strlen(self::BASE_PATH));

        }

    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

}