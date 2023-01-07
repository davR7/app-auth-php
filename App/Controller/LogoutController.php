<?php

namespace App\Controller;
use App\Helpers\{
  Auth,
  Session
};

abstract class LogoutController extends Controller {
  public static function index()
  {
    Session::init();
    Session::destroy();
    Auth::checkUnauthenticated();
  }
}