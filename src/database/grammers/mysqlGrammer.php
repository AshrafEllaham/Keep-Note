<?php

namespace KeepNote\database\grammers;


use App\Models\Model;

class mysqlGrammer
{
    // Create insert query
    public static function buildInsertQuery($keys)
    {
        $values = '';
        for ($i = 0; $i < count($keys); $i++) {
            $values .= '?, ';
        }

        return 'INSERT INTO ' . Model::getTableName() . ' (`' . implode('` ,`', $keys) . '`, `user_id`) VALUES(' . rtrim($values, ', ') . ',' . Model::getUserId() . ')';
    }

    // Create update query
    public static function buildUpdateQuery($id ,$keys)
    {
        $query = 'UPDATE ' . MODEL::getTableName() . ' SET ';

        foreach ($keys as $key) {
            $query .= "{$key} = ?, ";
        }

        return  rtrim($query, ', ') . ' WHERE ' . $id. ' = ? and user_id = ' . Model::getUserId();
    }

    // Create select query
    public static function buildSelectQuery($columns = '*', $filter = null, $user_id = true)
    {
        if (is_array($columns)) {
            $columns = implode(', ', $columns);
        }

        $query = "SELECT {$columns} FROM " . Model::getTableName();
        
        if($filter){
            $query .= " WHERE {$filter[0][0]} {$filter[0][1]} ?";
            
            if (count($filter) > 1) {
                for($i =1 ; $i<count($filter); $i++){
                    $query .= " AND {$filter[$i][0]} {$filter[$i][1]} ?";
                }
            }
        }

        if($user_id && $filter){
            $query .= " AND user_id = ". Model::getUserId();
        }elseif($user_id){
            $query .= " WHERE user_id = ". Model::getUserId();
        }
        
        return $query;
    }

    // Create delete query
    public static function buildDeleteQuery()
    {
        return 'DELETE FROM ' . Model::getTableName() . ' WHERE ID = ? and user_id = ' . Model::getUserId();
    }
}