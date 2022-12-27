<?php

namespace App\Controller;

abstract class NotFoundController extends Controller {
  public static function index()
  {
    self::render('NotFound');
  }
}