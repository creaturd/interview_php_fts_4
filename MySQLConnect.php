<?php
require_once "DBConnect.php";

class MySQLConnect extends DBConnect {
    private $pdo, $query, $results, $count;

    function connect($host, $port, $database, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host:$port; dbname=$database;", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
             die($exception->getMessage());
        }
    }

    function query($sql, $params = []) {
        try {
            $this->query = $this->pdo->prepare($sql);
        } catch (PDOException $exception) {
             die($exception->getMessage());
        }

        if (count($params)) {
            $i = 1;
            foreach ($params as $param)
            {
             $this->query->bindValue($i++, $param);
            }
        }

        if ($this->query->execute() === false) {

        } else {
            $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
            $this->count = $this->query->rowCount();
        }

        return $this->results;
    }

    function count() {
        return $this->count;
    }
}
