<?php

namespace App\Controller;

use App\Model\Model;
use App\Helpers\{
  Auth,
  FileBuildPath,
  Mustache
};

abstract class Controller
{
  /**
   * render: directory path based on operating system
   * @access public
   * @param string $filename
   * @param object $model
   * @return string
   */
  public static function render($filename, ?Model $model = null)
  {
    //page authorization
    self::validate($filename);

    //render header
    echo Mustache::replace('App\\View\\Template\\Header.php', 'style', $filename);

    //render content
    require_once(FileBuildPath::create("App\\View\\Main\\$filename" . '.php'));

    //render libraries
    require_once(FileBuildPath::create('App\\View\\Dependencies\\Libraries.php'));

    //render footer
    echo Mustache::replace('App\\View\\Template\\Footer.php', 'script', $filename);
  }
  public static function validate($filename)
  /**
   * validate: checks if the user has permission to access the content of the page.
   * @access public
   * @param string $filename
   * @return void
   */
  {
    if ($filename !== 'Auth') {
      Auth::checkUnauthenticated();
    } else {
      Auth::checkAuthenticated(); 
    }
  }
}