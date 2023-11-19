<?php

namespace KeepNote;

use KeepNote\http\Route;
use KeepNote\database\DB;
use KeepNote\http\Request;
use KeepNote\http\Response;
use KeepNote\database\managers\mysqlManager;

class Application
{
    // Define application dependencies
    protected Route $route;
    protected Request $request;
    protected Response $response;
    protected DB $db;

    // Initialize dependencies
    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
        $this->route = new Route($this->request, $this->response);
        $this->db = new DB($this->getDatabaseDriver());
    }

    // Determine database driver based on environment
    protected function getDatabaseDriver()
    {
        return match (env('DB_DRIVER')) {
            'mysql' => new mysqlManager,
            default => new mysqlManager
        };
    }

    // Execute the application
    public function run()
    {
        $this->db->init();

        $this->route->resolve();
    }

    // Allow accessing properties using the magic method
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
