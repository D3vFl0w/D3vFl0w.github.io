<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "mariage");

$dns = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;

try {
    $db = new PDO($dns, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Echec de la connexion : ' . $e->getMessage());
}
?>