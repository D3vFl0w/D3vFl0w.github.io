<?php

class Manager
{
    protected function dbConnect()
    {
        define("DBHOST", "localhost");
        define("DBUSER", "root");
        define("DBPASS", "");
        define("DBNAME", "mariage");

        $dns = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
        $db = new PDO($dns, DBUSER, DBPASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $db;
    }
}