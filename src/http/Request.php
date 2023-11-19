<?php

namespace KeepNote\http;

use KeepNote\support\Arr;


class Request
{
    // Returns request path.
    public function path()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        
        // if user request any page and he isnt login redirct automatically to login page
        session_start();
        if(!isset($_SESSION['user_id']) && $path != '/login' && $path != '/signup' && $path != '/signup/signup'){
            header("location:http://localhost:9000/login");
        }   
        
        return str_contains($path, '?') ? explode('?', $path)[0] : $path;
    }

    // Returns request parameters from GET request.
    public function getParams()
    {
        $params = null;
        
        $path = $_SERVER['REQUEST_URI'];
        if (str_contains($path, '?')){
            $params = [$_GET];
        }
        return $params;
    }

    // Returns request parameters from POST request.
    public function postParams()
    {
        return [$_POST];
    }

    // Returns request method (GET, POST, etc.).
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    // Returns all request parameters.
    public function all()
    {
        return $_REQUEST;
    }

    // Returns request parameters only for specified keys.
    public function only($keys)
    {
        return Arr::only($this->all(), $keys);
    }

    // Returns request parameters for specified keys.
    public function get($key)
    {
        return Arr::get($this->all(), $key);
    }
}