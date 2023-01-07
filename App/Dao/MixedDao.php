<?php

namespace App\Dao;

use App\Dao\Dao;

class MixedDao {
  private $conn;
  
  public function __construct()
  {
    $this->conn = new Dao;
  }
  public function selectOne(string $table, array $filter)
  {
    $fKey = array_keys($filter)[0];
    $fValue = array_values($filter)[0];

    $query = "SELECT * FROM $table WHERE $fKey=?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$fValue]);
    $data = $stmt->fetch();
    return $data;
  }
}