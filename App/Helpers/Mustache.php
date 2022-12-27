<?php

namespace App\Helpers;

abstract class Mustache {
  /**
   * replace: the mustache(double curly braces) will be replaced with the value of the variable.
   * @access public
   * @param string $template
   * @param string $mustache
   * @param string $value
   * @return string
   */
  public static function replace($template, $mustache, $value)
  {
    $content = file_get_contents(
      FileBuildPath::create($template)
    );
    return str_replace("{{{$mustache}}}", strtolower($value), $content);
  }
}