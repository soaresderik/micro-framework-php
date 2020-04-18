<?php

namespace App\Core;

class SQL
{

  private $conn;
  public function __construct()
  {
    self::$conn = Database::getConnection();
  }

  private function setParams($statement, $parameters = array())
  {

    foreach ($parameters as $key => $value) {

      $this->bindParam($statement, $key, $value);
    }
  }

  private function bindParam($statement, $key, $value)
  {

    $statement->bindParam($key, $value);
  }

  public static function query($rawQuery, $params = array())
  {

    $stmt = self::$conn->prepare($rawQuery);

    self::setParams($stmt, $params);

    $stmt->execute();

    return self::$conn->lastInsertId();
  }

  public static function select($rawQuery, $params = array()): array
  {

    $stmt = self::$conn->prepare($rawQuery);

    self::setParams($stmt, $params);

    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
}
