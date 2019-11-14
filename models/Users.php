<?php
namespace app\models;

class Users extends DbModel
{
    public $id;
    public $login;
    public $pass;

    public function getTableName()
    {
        return "users";
    }
}