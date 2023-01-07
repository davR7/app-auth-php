<?php

namespace App\Dao;

use App\Dao\Dao;
use App\Model\RegisterModel;

class UserDao {
  private $conn;
  
  public function __construct()
  {
    $this->conn = new Dao;
  }
  public function insert(RegisterModel $user)
  {
    $query = "INSERT INTO users (`fullname`, `email`, `password`, `admin`) VALUES (?, ?, ?, ?)";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(1, $user->fullname);
    $stmt->bindValue(2, $user->email);
    $stmt->bindValue(3, $user->password);
    $stmt->bindValue(4, 0);
    $stmt->execute();
    $stmt = null;
  }
}