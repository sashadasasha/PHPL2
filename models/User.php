<?php

namespace app\models;

class User extends Model
{
    public $id;
    public $login;
    public $pass;


    public function __construct($id = null, $login = null, $pass = null) {
       
        $this->id = $id;
        $this->login = $login;
        $this->pass = $pass;
    }
    public static function getTableName() {

        return 'users';
    }


}