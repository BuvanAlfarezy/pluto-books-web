<?php

namespace Advan\BooksWeb\Core;

class Router
{
    public static function get($uri, $controller, $method)
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if ($requestUri === $uri) {

            $controller = new $controller();

            return $controller->$method();
        }
    }
}