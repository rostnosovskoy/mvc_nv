<?php
namespace lib;

class UriRouter extends Router
{
    const BASE_PATH = '/mvc/frameworkFromNVlasuk/web';
    protected $route;
    protected $lang;

    public function parseUri($uri)
    {
        $parts = [];
        $uri = $this->cutBasePath();
        $uri = trim($uri, '/');

        $parse = explode('/', $uri);

        $uriPart = array_shift($parts);

        $allowedRoutes = Config::get('routes');
        $allowedRoutes = array_keys($allowedRoutes);

        $allowedLang = Config::get('langs');

        if (in_array($uriPart, $allowedRoutes))
        {
            $this->route = $uriPart;
            $uriPart = @array_shift($parts);
        } else

        if (in_array($uriPart, $allowedLang)){
            $this->lang = $uriPart;
            $uriPart = @array_shift($parts);
        }

        if ($uriPart)
        {
            $this->controller = $uriPart;
            $uriPart = @array_shift($parts);
        }
        if ($uriPart)
        {
            $this->action = $uriPart;
        }

        if ($parts)
        {
            $this->params = $parts;
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