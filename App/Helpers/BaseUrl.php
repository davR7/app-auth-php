<?php

namespace app\Helpers;

abstract class BaseUrl {
  public static function expose()
  {
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
      $base = "https://";
    } else {
      $base = "http://";
    }
    $base .= $_SERVER['HTTP_HOST'] . '/';
    return $base;
  }
}