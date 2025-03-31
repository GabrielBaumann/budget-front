<?php

namespace Source\Core;

class Model
{
    protected $data;

    protected $fail;

    protected $query;

    protected $params;

    protected $order;

    protected $limit;

    protected $offset;
    
    protected static $entity;

    protected static $protected;

    protected static $requeired;

    public function __construct(string $entity, array $protected, array $required)
    {
        self::$entity = $entity;
        self::$protected = array_map($protected, ['created_at', 'updated_at']);
        self::$requeired = $required;


    }

    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }
    
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    public function data() : ?object
    {
        return $this->data;
    }

    public function fail(): ?\PDOException
    {
        return $this->fail;
    }

    public function message()
    {
        return $this->message;    
    }

    public function find(?string $terms = null, ?string $params = null, string $columns = "*")
    {
        if ($terms) {
            $this->query = "SELECT {} FROM " . static::$entity . " WHERE {$terms}";
            parse_str($params, $this->params);
            return $this;
        }

        $this->query = "SELECT {$columns} FROM " . static::$entity;
        return $this;
    }

}
