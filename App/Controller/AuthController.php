<?php

namespace App\Controller;

abstract class AuthController extends Controller {
  public static function index()
  {
    self::render('Auth');
  }
}