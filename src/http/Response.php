<?php

namespace KeepNote\http;

class Response
{
    // Set HTTP status code
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    // Redirect to previous page
    public function back()
    {
        header('Location:' . $_SERVER['HTTP_REFERER']);
        return $this;
    }
}