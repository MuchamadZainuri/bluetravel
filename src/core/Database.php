<?php

namespace MyApp\Core;

use Exception;
use mysqli;

class Database
{
    private $conn;
    private $tableName;
    private $column = [];

    public function __construct()
    {
        $this->conn = $this->setConnection();
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    public function setColumn($column)
    {
        $this->column = $column;
    }

    protected function setConnection()
    {
        try {
            $conn = new mysqli(
                getenv('DB_HOST'),
                getenv('DB_USER'),
                getenv('DB_PASS'),
                getenv('DB_NAME'),
                getenv('DB_PORT')
            );
            if ($conn->connect_error) {
                throw new Exception($conn->connect_error);
            }
            return $conn;
        } catch (Exception $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }

    private function getColumns()
    {
        return !empty($this->column) ? implode(",", $this->column) : '*';
    }

    private function buildWhereClause($params)
    {
        $sql = '';
        $values = [];

        if (!empty($params)) {
            $conditions = [];
            foreach ($params as $key => $value) {
                $conditions[] = "{$key} = ?";
                $values[] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        return [$sql, $values];
    }

    public function query($query, $params = array())
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function get($params = [])
    {
        $columns = $this->getColumns();
        $sql = "SELECT $columns FROM {$this->tableName}";
        list($whereClause, $paramValues) = $this->buildWhereClause($params);
        $sql .= $whereClause;
        return $this->query($sql, $paramValues);
    }

    public function insert($data)
    {
        if (empty($data)) return false;
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO {$this->tableName} ($columns) VALUES ($placeholders)";
        return $this->query($sql, array_values($data));
    }

    public function updateData($data, $where)
    {
        if (empty($data)) return false;

        $setClause = implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
        list($whereClause, $whereValues) = $this->buildWhereClause($where);
        $sql = "UPDATE {$this->tableName} SET $setClause $whereClause";
        $values = array_merge(array_values($data), $whereValues);

        return $this->query($sql, $values);
    }

    public function deleteData($where)
    {
        if (empty($where)) return false;

        list($whereClause, $values) = $this->buildWhereClause($where);
        $sql = "DELETE FROM {$this->tableName} $whereClause";

        return $this->query($sql, $values);
    }

    public function randomData($limit)
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY RAND() LIMIT ?";
        return $this->query($sql, [$limit])->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    public function joinData($joinTables = [], $moreColumns = [], $joinType = 'INNER JOIN', $params = [])
    {
        $columns = explode(',', $this->getColumns());
        $columns = array_map(fn($column) => "{$this->tableName}.$column", $columns);
        $columns = implode(',', $columns);

        if (!empty($moreColumns)) {
            $selectColumns = $columns. "," . implode(',', $moreColumns);
        }else{
            $selectColumns = $columns;
        }

        $sql = "SELECT $selectColumns FROM {$this->tableName}";
        
        foreach ($joinTables as $joinTable => $joinOn) {
            $sql .= " $joinType $joinTable ON {$this->tableName}.$joinOn = $joinTable.id";
        }

        list($whereClause, $paramValues) = $this->buildWhereClause($params);
        $sql .= $whereClause;

        
        return $this->query($sql, $paramValues);
    }

}
