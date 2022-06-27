<?php

namespace Models\Model;

class Model
{
    protected static $hostname = "localhost";
    protected static $username = "root";
    protected static $password = "";
    protected static $database = "shoe_shop";
    protected static $connection;
    protected static $db_status;
    protected static $statement;

    protected static function connection($table)
    {
        self::$connection = new \PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8", self::$username, self::$password);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sqlQueryString = "SELECT * FROM " . $table;
        self::$statement = self::$connection->prepare($sqlQueryString);
        self::$db_status = self::$statement->execute();
        return self::$connection;
        return self::$statement;
        return self::$db_status;
    }

    protected static function fetchAll()
    {
        $rows = self::$statement->fetchAll();
        $numberOfRows = count($rows);
        if ($numberOfRows > 0) {
            return $rows;
        }
        return null;
    }
}
