<?php

namespace App\Controller;

abstract class HomeController extends Controller {
  public static function index()
  {
    self::render('Home');
  }
}