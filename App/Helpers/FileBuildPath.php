<?php

namespace App\Helpers;

abstract class FileBuildPath {
  /**
   * create: directory path based on operating system
   * @access public
   * @param array $segments
   * @return string
   */
  public static function create(...$segments) 
  {
    return join(DIRECTORY_SEPARATOR, $segments);
  }
}