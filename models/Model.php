<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModels;

abstract class Model implements IModels
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function insert() 
    {
        $tableName = $this->getTableName();
        foreach ($this as $key => $value) {
            if ($key !== "id" && $key !== "db") {
            $fields[] = "$key";
            $values[":{$key}"] = $value;
            }
        }  
        $fields = implode(", ",$fields);  
        $params = implode(", ",array_keys($values));
            
        $sql = "INSERT INTO {$tableName} ({$fields}) VALUES ({$params})";
        var_dump($sql);
        Db::getInstance()->execute($sql, $values);
        $this->id = Db::getInstance()->lastInsertId();
    
    }
    public function delete() 
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `{$tableName}`.`id` = :id";
        var_dump($sql);
        Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function update() 
    {

    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        var_dump($sql);
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    abstract public function getTableName();

}