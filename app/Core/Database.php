<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
  public static function getConnection()
  {
    $settings = include_once __DIR__ . "/../settings.php";

    $host = $settings['db']['host'];
    $dbname = $settings['db']['database'];
    $user = $settings['db']['user'];
    $pass = $settings['db']['pass'];
    $charset = $settings['db']['charset'];
    $flags = $settings['db']['flags'];

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    try {
      $pdo = new PDO($dsn, $user, $pass, $flags);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES '$charset' COLLATE '$collation'");
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      return $pdo;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
