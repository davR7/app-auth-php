<?php

namespace App\Controller;

use App\Model\RegisterModel;
use App\Helpers\SanitizeInput;

abstract class RegisterController extends Controller {
  public static function index()
  {
    $model = new RegisterModel();
    if (isset($_POST['action']) ?? null){
      $model->fullname = SanitizeInput::exec($_POST['fullname']);
      $model->email = SanitizeInput::exec($_POST['email']);
      $model->password = SanitizeInput::exec($_POST['password']);
      $model->passwordConfirm = SanitizeInput::exec($_POST['passwordConfirm']);
      $model->save();
    }
  }
}