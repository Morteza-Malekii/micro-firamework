<?php

namespace App\Models\Contracts;
use Medoo\Medoo;

class MysqlBaseModel extends BaseModel
{
    public function __construct($id = null)
    {
        try {
            $this->connection = new Medoo([
                'type' => 'mysql',
                'host' => $_ENV['DB_HOST'],
                'database' => $_ENV['DB_NAME'],
                'username' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASS'],
                'charset' => 'utf8mb4',
                'error' => \PDO::ERRMODE_EXCEPTION,
                'command' => [
	        	'SET SQL_MODE=ANSI_QUOTES'
            	],
                'logging' => true,
                'prefix' => '',

            ]);
            }
        catch(\PDOException $e)
            {
            echo $e->getMessage();
            }
        if(!is_null($id))    
        return $this->find($id);    
    }

    public function remove():int
    {
        $recordId = $this->{$this->primarykey};
        return $this->delete([$this->primarykey=>$recordId]);
    }
    public function save():int
    {
        $recordId = $this->{$this->primarykey};
        return $this->update($this->attributes,[$this->primarykey=>$recordId]);
    }
    

    public function create(array $data): int
    {
        $this->connection
        ->insert($this->table, $data);
        return $this->connection->id();
    }

    public function find($id): object
    {
        $result = $this->connection
        ->get($this->table, '*', [$this->primarykey=>$id]);
        $records = (object)$result;
        $this->attributes = get_object_vars($records);
        return $this;
    }

    public function getAll():array
    {
        $result = $this->connection
        ->select($this->table, '*');
        return $result;
    }

    function get(array $columns, array $where): array 
    {
        $result = $this->connection
        ->select($this->table, $columns, $where);
        return $result;
    }

    public function update(array $newdata ,array $where): int
    {
        $result = $this->connection
        ->update($this->table, $newdata, $where);
        return $result->rowCount();
    }

    public function delete(array $where): int
    {
        $result = $this->connection
        ->delete($this->table, $where);
        return $result->rowCount();
    }
}
