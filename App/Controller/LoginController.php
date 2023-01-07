<?php

namespace App\Controller;

use App\Model\LoginModel;
use App\Helpers\SanitizeInput;

abstract class LoginController extends Controller {
  public static function index()
  {
    $model = new LoginModel();
    if (isset($_POST['action']) ?? null){
      $model->email = SanitizeInput::exec($_POST['email']);
      $model->password = SanitizeInput::exec($_POST['password']);
      $model->login();
    }
  }
}