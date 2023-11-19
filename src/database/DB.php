<?php

namespace KeepNote\database;

use KeepNote\database\Concerns\ConnectsTo;
use KeepNote\database\managers\Contracts\DatabaseManager;

class DB
{
    // Manage Database Connections
    protected DatabaseManager $manager;

    // Initialize Database Connection
    public function __construct(DatabaseManager $manager)
    {
        $this->manager = $manager;
    }

    public function init()
    {
        // Establish Connection
        ConnectsTo::connect($this->manager);
    }

    // Execute Raw SQL Query
    protected function raw(string $query, $value = [])
    {
        return $this->manager->query($query, $value);
    }

    // Create New Database Record
    protected function create(array $data)
    {
        return $this->manager->create($data);
    }

    // Delete Database Record
    protected function delete($id)
    {
        return $this->manager->delete($id);
    }

    // Update Database Record
    protected function update($id, array $attributes)
    {
        return $this->manager->update($id, $attributes);
    }

    // Retrieve Database Records
    protected function read($columns = '*', $filter = null, $user_id = true)
    {
        return $this->manager->read($columns, $filter, $user_id);
    }

    // Handle Custom Function Calls
    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        }
    }
}