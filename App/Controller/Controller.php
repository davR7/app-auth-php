<?php

namespace App\Controller;

use App\Model\Model;
use App\Helpers\{
  FileBuildPath,
  Mustache
};

abstract class Controller {
  /**
   * render: directory path based on operating system
   * @access public
   * @param string $filename
   * @param object $model
   * @return string
   */
  public static function render($filename, ?Model $model = null)
  {
    //render header
    echo Mustache::replace('App\\View\\Template\\Header.php', 'style', $filename);
    
    //render content
    require_once(FileBuildPath::create("App\\View\\Main\\$filename".'.php'));

    //render footer
    echo Mustache::replace('App\\View\\Template\\Footer.php', 'script', $filename);
  }
}