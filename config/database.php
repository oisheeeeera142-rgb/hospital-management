<?php

class Database
{
    private $host = "localhost";
    private $port = "3307";
    private $db_name = "hospital";
    private $username = "root";
    private $password = "";

    public $conn;

    public function connect()
    {
        $this->conn = null;

        try {

            $dsn = "mysql:host=" . $this->host .
                   ";port=" . $this->port .
                   ";dbname=" . $this->db_name;

            $this->conn = new PDO(
                $dsn,
                $this->username,
                $this->password
            );

            $this->conn->exec("SET NAMES utf8");

            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $this->conn->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

        } catch (PDOException $exception) {

            die(
                "Database Connection Error: " .
                $exception->getMessage()
            );
        }

        return $this->conn;
    }
}