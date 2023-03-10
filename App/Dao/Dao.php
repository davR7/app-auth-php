<?php

namespace App\Dao;

use Exception, PDO, PDOException; 

class Dao extends PDO {

  public function __construct()
  {
    $db = $_ENV['DATABASE'];
    
    $dns = $db['DRIVER'] . ':host=' . $db['HOST'] .
      ';dbname=' . $db['SCHEMA'] . ';port=' . $db['PORT'];

    $options = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false
    ];

    try {
      parent::__construct(
        $dns, 
        $db['USERNAME'], 
        $db['PASSWORD'],
        $options
      );
    } catch(PDOException $e) {
      echo "database error: {$e->getMessage()}";
    } catch(Exception $e) {
      echo "generic error: {$e->getMessage()}";
    }
  }
}