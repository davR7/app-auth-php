<?php

namespace app\Helpers;

abstract class SanitizeInput {
   /**
   * exec: the method checks, cleans, and filters the form's data entries.
   * @access public
   * @param string $data
   * @return string
   */
  public static function exec(string $data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}