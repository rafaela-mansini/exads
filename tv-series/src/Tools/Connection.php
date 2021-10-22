<?php
namespace TvSeries\Tools;

class Connection {

    private static $instance = null;

    private function __construct() {
        try {
            $host = $_ENV['DB_HOST'];
            $database = $_ENV['DB_DATABASE'];
            $this->instance = new \PDO("mysql:host=$host;dbname=$database", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            $this->instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }

    public static function getConnection() {
        if(self::$instance === null) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }
}