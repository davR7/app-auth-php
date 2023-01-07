<?php
$routes = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

use App\Controller\ {
  AuthController,
  HomeController,
  LoginController,
  LogoutController,
  RegisterController,
  NotFoundController
};

echo $match = match ($routes) {
  '/' => HomeController::index(),
  '/auth' => AuthController::index(),
  '/auth/login' => LoginController::index(),
  '/auth/register' => RegisterController::index(),
  '/logout' => LogoutController::index(),
  default => NotFoundController::index()
};