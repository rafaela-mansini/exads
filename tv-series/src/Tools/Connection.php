<?php
namespace TvSeries\Tools;

use \PDO;
use \PDOException;
class Connection{

    static private $instance;
    
    public static function getConnection() {
        if (self::$instance) {
            return self::$instance;
        }

        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $database = $_ENV['DB_DATABASE'];

        $dns = "mysql:host=$host;port=$port;dbname=$database";
        self::$instance = new PDO($dns, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

        return self::$instance;
    }

    public static function __callStatic ($name, $args) {
        $callback = array (self::getConnection(), $name);
        return call_user_func_array($callback, $args);
    }
}