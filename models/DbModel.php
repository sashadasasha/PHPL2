<?php

namespace app\models;

use app\engine\Db;

abstract class DbModel extends Model
{
  
  public static function getLimit ($from = 0, $to = 4) 
  { 
    $tableName = static::getTableName();
    $numbers = $to - $from;
    $sql = "SELECT * FROM {$tableName} LIMIT {$numbers} OFFSET {$from}";
    return Db::getInstance()->queryAll($sql);
  }

  public function getWhere($name, $value) 
  {

  }

  public function insert() 
  {
        $fields = [];
        $values = [];
        $tableName = $this->getTableName();
        foreach ($this->props as $value) {        
            $fields[] = "$value";
            $values[":{$value}"] = $this->$value;
        }  
        $fields = implode(", ",$fields);  
        $params = implode(", ",array_keys($values));
            
        $sql = "INSERT INTO {$tableName} ({$fields}) VALUES ({$params})";
        //var_dump($sql);
        Db::getInstance()->execute($sql, $values);
        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    
  }

  public function delete() 
  {
      $tableName = static::getTableName();
      $sql = "DELETE FROM `{$tableName}` WHERE `{$tableName}`.`id` = :id";
      //var_dump($sql);
      Db::getInstance()->execute($sql, ['id' => $this->id]);
      return $this;
  }

  public static function deleteById($id)
    {
      $tableName = static::getTableName();
      $sql = "DELETE FROM `{$tableName}` WHERE `{$tableName}`.`id` = :id";
      return Db::getInstance()->execute($sql, ['id' => $id]);
    }

    public function update() 
    {

    }

    public function save() 
    {
      if (is_null($this->id)) {
          $this->insert();
      } else {
          $this->update;
      }
    }

    public static function getOne($id) 
    {
      $tableName = static::getTableName();
      $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
      //var_dump($sql);
      return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }
    public static function getAll() 
    {
      $tableName = static::getTableName();
      $sql = "SELECT * FROM `{$tableName}`";
      return Db::getInstance()->queryAll($sql);
    }

    abstract public static function getTableName();
}