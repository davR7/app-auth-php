<?php

namespace App\Dao;

use App\Dao\Dao;
use App\Model\LoginModel;

class LoginLogsDao
{
  private $conn;
  public function __construct()
  {
    $this->conn = new Dao;
  }
  public function select()
  {
    $query = "SELECT count(*) AS blocked, MINUTE(TIMEDIFF(NOW(), MAX(date_time))) AS time_min ";
    $query .= "FROM loginlogs WHERE ip = ? and DATE_FORMAT(date_time,'%Y-%m-%d') = ? AND blocked = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(1, $_SERVER['SERVER_ADDR']);
    $stmt->bindValue(2, date('Y-m-d'));
    $stmt->bindValue(3, 1);
    $stmt->execute();
    $data = $stmt->fetch();
    return $data;
  }
  public function insert(LoginModel $user, int $blocked)
  {
    $query = 'INSERT INTO loginlogs (`ip`, `email`, `origin`, `blocked`) VALUES (?, ?, ?, ?)';
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(1, $_SERVER['SERVER_ADDR']);
    $stmt->bindValue(2, $user->email);
    $stmt->bindValue(3, $_SERVER['HTTP_REFERER']);
    $stmt->bindValue(4, $blocked);
    $stmt->execute();
  }
}
