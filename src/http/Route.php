<?php

namespace KeepNote\http;

use KeepNote\view\View;
use KeepNote\http\Request;
use KeepNote\http\Response;

class Route
{
    // request object for route handling
    protected Request $request;
    
    // response object for route handling
    protected Response $response;

    // array to store route definitions
    protected static array $routes = [];

    // constructor for route class
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    // register get route
    public static function get($route, $action)
    {
        self::$routes['get'][$route] = $action;
    }

    // register post route
    public static function post($route, $action)
    {
        self::$routes['post'][$route] = $action;
    }

    // resolve route and handle it
    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->getMethod();
        $action = self::$routes[$method][$path] ?? false;

        if (!array_key_exists($path, self::$routes[$method])) {
            $this->response->setStatusCode(404);
            View::makeError('404');
        }

        if (!$action) {
            return;
        }

        $params = $this->request->getParams() ?: $this->request->postParams();

        if (is_callable($action)) {
            call_user_func_array($action, $params ? $params : []);
        }

        if (is_array($action)) {
            $controller = new $action[0];
            $method = $action[1];

            call_user_func_array([$controller, $method],$params ? $params : []);
        }
    }
}
