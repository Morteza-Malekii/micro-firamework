<?php

namespace App\Models\Contracts;

abstract class BaseModel implements CrudInterface
{
    protected $connection;
    protected $table;
    protected $primarykey = 'id';
    protected $attributes = [];
    protected $pageSize = 10;

    protected function __construct()
    {
        #if mysql => det mysqlconnection 
    }

    public function getAttribute($key)
    {
        if (!$key || !array_key_exists($key,$this->attributes))
        {
            return null;
        }
        return $this->attributes[$key];
    }
    public function getAllAttributes()
    {
        return $this->attributes;
    }

    public function __get($name)
    {
        return $this->getAttribute($name);
    }

    public function __set($property, $value)
    {
        if (!array_key_exists($property,$this->attributes))
            return null;
        $this->attributes[$property] = $value;
    }
}