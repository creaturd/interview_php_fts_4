<?php

abstract class DBConnect
{
    abstract public function connect($host, $port, $database, $username, $password);
    abstract public function query($sql, $params);
}