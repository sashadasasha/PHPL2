<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{
    use TSingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'mysql',
        'login' => 'root',
        'password' => 'root',
        'database' => 'shop',
        'charset' => 'utf8',
    ];

    private $connection = null;

    protected function getConnection() 
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->prepareDSNString(),
                $this->config['login'],
                $this->config['password']
            );
            //var_dump($this->connection);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }
//"SELECT * FROM goods WHERE id = :id;", ["id" => 1]
    public function query($sql, $params)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        //var_dump($pdoStatement);
        $pdoStatement->execute($params);
        //var_dump($params);
        return $pdoStatement;
    }

    public function execute($sql, $params) 
    {
        $this->query($sql, $params);
        return true;
    }

    public function queryObject($sql, $params, $class) 
    {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $pdoStatement->fetch();
    }



    private function prepareDSNString() 
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
            //$this->config['port']
        );
    }


    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function __toString()
    {
        return "Db";
    }

    public function lastInsertId() 
    {
        return $this->getConnection()->lastInsertId();
    }

}