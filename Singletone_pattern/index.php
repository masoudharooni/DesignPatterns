<?php
include "SingletoneException.php";
class Singletone
{
    protected static $instance;
    public function __construct()
    {
        throw new SingletoneException("You cannot get and instance of this class!");
    }
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}

class Config extends Singletone
{
    public function getConfig()
    {
        return [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname' => 'Dummy'
        ];
    }
}

// $config = Config::getInstance();
$config1 = new Config;
var_dump($config->getConfig());
