<?php

namespace App\Helpers;

abstract class Navigate {
  /**
   * to: redirects to the specified path.
   * @access public
   * @param string $url
   * @param bool $permanent
   * @return void
   */
  public static function to(string $url, bool $permanent = false)
  {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
  }
}