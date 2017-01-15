<?php

namespace DBC;

use PDO;

class DatabaseFactory
{
    private static $class;
    private $connection;

    private function __construct( $configManager ){
        $mysqlConf = $configManager->get('database');

        $host = $mysqlConf['mysql']['host'];
        $dbname = $mysqlConf['mysql']['database'];
        $dbuser = $mysqlConf['mysql']['user'];
        $dbpswd = $mysqlConf['mysql']['password'];

        $this->connection = new PDO("mysql:host=$host;dbname=$dbname",$dbuser,$dbpswd);
    }

    public static function getInstance($configManager){

        if(self::$class == null){
            self::$class = new DatabaseFactory($configManager);
        }
        return self::$class;
    }

    public function __call($name, $arguments)
    {
        $className = "DBC\\".str_replace("get","", $name);
        return new $className($this->connection);
    }
}

?>
