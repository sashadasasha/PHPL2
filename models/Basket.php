<?php
namespace app\models;
use app\engine\Db;

class Basket extends DbModel
{

    protected $session_id;
    protected $product_id;

    protected $props = [
        'session_id' => false, 
        'product_id' => false, 
        ];

    public static function getTableName()
    {
        return "basket";
    }

    public function __construct($session_id = null, $product_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }

    public static function getBasket() 
    {
        $session_id = session_id();
        $tableName = static::getTableName();
        $params = [
            'session_id' => $session_id
        ];
        $sql = "SELECT `basket`.`id` AS `id`, `products`.`name` AS `name`, `products`.`price` AS `price`, `products`.`image` AS `image`, `products`.`description` AS `description`  
        FROM `{$tableName}` INNER JOIN `products` WHERE `basket`.`product_id` = `products`.`id`  AND `basket`.`session_id`= :session_id";
        return Db::getInstance()->queryAll($sql, $params);

    } 
}