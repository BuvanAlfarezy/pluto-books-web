<?php

namespace Advan\BooksWeb\Core;

class Router
{
    public static function get($uri, $controller, $method)
    {
        self::add('GET', $uri, $controller, $method);
    }

    public static function post($uri, $controller, $method)
    {
        self::add('POST', $uri, $controller, $method);
    }

    private static function add($httpMethod, $uri, $controller, $method)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if ($requestMethod !== $httpMethod) {
            return;
        }

        $pattern = preg_replace('#\{id\}#', '([0-9]+)', $uri);
        $pattern = "#^" . $pattern . "$#";

        if (preg_match($pattern, $requestUri, $matches)) {
            array_shift($matches);

            $controllerObject = new $controller();

            return call_user_func_array(
                [$controllerObject, $method],
                $matches
            );
        }
    }
}