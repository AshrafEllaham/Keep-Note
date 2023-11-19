<?php

namespace KeepNote\database\managers;

use KeepNote\database\grammers\mysqlGrammer;
use KeepNote\database\managers\Contracts\DatabaseManager;

class mysqlManager implements DatabaseManager
{
    protected static $instance;

    // Singleton connection
    public function connect(): \PDO
    {
        if(!self::$instance){
            self::$instance = new \PDO(env('DB_DRIVER') . ':host=' . env('DB_HOST') . ';dbname=' . env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'));
        }

        return self::$instance;
    }

    // Query execution with parameters
    public function query(string $query, $values = [])
    {
        $stmt = self::$instance->prepare($query);

        for ($i = 1; $i <= count($values); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Query building & execution for reading
    public function read($columns = '*', $filter = null, $user_id = true)
    {
        $query = mysqlGrammer::buildSelectQuery($columns, $filter, $user_id);
        
        $stmt = Self::$instance->prepare($query);
        
        if ($filter) {
            for($i=0; $i<count($filter); $i++){
                $stmt->bindValue($i+1, $filter[$i][2]);
            }
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Query building & execution for deleting
    public function delete($id)
    {
        $query = mysqlGrammer::buildDeleteQuery();

        $stmt = self::$instance->prepare($query);

        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }

    // Query building & execution for updating
    public function update($id, $attributes)
    {
        
        $query = mysqlGrammer::buildUpdateQuery($id[0],array_keys($attributes));

        $stmt = self::$instance->prepare($query);

        for ($i = 1; $i <= count($values = array_values($attributes)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
            if ($i == count($values)) {
                $stmt->bindValue($i + 1, $id[1]);
            }
        }

        return $stmt->execute();
    }

    // Query building & execution for creating
    public function create($data)
    {
        $query = mysqlGrammer::buildInsertQuery(array_keys($data));

        $stmt = self::$instance->prepare($query);

        for ($i = 1; $i <= count($values = array_values($data)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
        }

        return $stmt->execute();
    }
}
