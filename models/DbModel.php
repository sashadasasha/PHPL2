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

  public static function getCountWhere($field, $value) 
  {
    $tableName = static::getTableName();
    $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:value";
    return Db::getInstance()->queryOne($sql, ["value"=>$value])['count'];
  }

  public function getWhereOne($field, $value)
  {
      $tableName = static::getTableName();
      $sql = "SELECT * FROM {$tableName} WHERE `$field`=:value";
      return Db::getInstance()->queryObject($sql, ["value" => $value], static::class);
  }
  public function insert() 
  {
        $fields = [];
        $values = [];
        $params = [];
        $tableName = $this->getTableName();
        foreach ($this->props as $key => $value) {  
         // var_dump($key);
         // var_dump($this->$key);      
          $fields[] = "$key";
          $values[":{$key}"] = $this->$key;
          
         }  
        // var_dump($values);
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
      if (count($this->props) > 0) {
        $params = [];
        $string = '';
        $params['id'] = $this->id;
        $tableName = $this->getTableName();
        foreach ($this->props as $key => $value) {
          if($value) {
          $params["{$key}"] = $this->$key;
          }
        }  
        foreach ($params as $key => $value) {
          if ($key != 'id') {
            $string .= "{$key} = :{$key}, ";
          }
        }
        
        $string = substr($string, 0, -2);
        
        $sql = "UPDATE `{$tableName}` SET {$string} WHERE id = :id";
        var_dump($sql, $params);
        return Db::getInstance()->execute($sql, $params);
        //return $this;
    }
    }

    public function save() 
    {
      if (is_null($this->id)) {
          $this->insert();
         // var_dump("сработал insert");
      } else {
          $this->update();
          //var_dump("сработал update");
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