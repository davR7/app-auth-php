<?php

namespace app\Helpers;

abstract class Auth {
  public static function checkAuthenticated($redirect = '')
  {
    Session::init();
    if (Session::get('logged')) {
      Navigate::to(BaseUrl::expose() . $redirect);
    }
  }
  public static function checkUnauthenticated($redirect = 'auth')
  {
    Session::init();
    if (!Session::get('logged')) {
      Session::destroy();
      Navigate::to(BaseUrl::expose() . $redirect);
    }
  }
}