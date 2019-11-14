<?php
namespace app\models;
use app\engine\Db;

class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $goods_id;

    public static function getTableName()
    {
        return "basket";
    }

    public static function addToBasket($id) 
    {
            $id = (int)$id;
            $session_id = session_id();
            $tableName = static::getTableName();
            $params = [
                'session_id' => $session_id,
                'id' => $id
            ];
            $sql = "INSERT INTO {$tableName} (`session_id`, `product_id`) VALUES (:session_id, :id)";
            var_dump($sql);
            return Db::getInstance()->execute($sql, $params);    
    }

    public static function getBasket() 
    {
        $session_id = session_id();
        $tableName = static::getTableName();
        $params = [
            'session_id' => $session_id
        ];
        $sql = "SELECT * FROM `basket` INNER JOIN `products` WHERE `basket`.`product_id` = `products`.`id`  AND `basket`.`session_id`= :session_id";
        return Db::getInstance()->queryAll($sql, $params);

    } 
}