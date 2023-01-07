<?php

namespace App\Helpers;

abstract class Session {
  /**
   * del: delete the session that was passed as an argument.
   * @access public
   * @param string $key
   * @return bool
   */
  public static function del($key)
  {
    if (self::exists($key)) {
      unset($_SESSION[$key]);
      return true;
    }
    return false;
  }
  /**
   * destroy: destroys all of the data associated with the current session.
   * @access public
   * @return void
   */
  public static function destroy()
  {
    session_destroy();
  }
  /**
   * exists: checks if there is specified session.
   * @access public
   * @param string $key
   * @return bool
   */
  public static function exists($key)
  {
    return isset($_SESSION[$key]);
  }
   /**
   * init: if you don't have a session created, the method will start one.
   * @access public
   * @return void
   */
  public static function init()
  {
    if (session_id() == "") {
      session_start();
    }
  }
  /**
   * get: returns the value of a specific key of the session if it exists.
   * @access public
   * @param string $key
   * @return string
   */
  public static function get($key)
  {
    if (self::exists($key)) {
      return $_SESSION[$key];
    }
  }
  /**
   * set: sets a specific value to a specific key of the session
   * @access public
   * @param string $key
   * @param string $value
   * @return void
   */
  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }
}