<?php
$routes = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

use App\Controller\ {
  AuthController,
  HomeController,
  RegisterController,
  NotFoundController
};

echo $match = match ($routes) {
  '/' => HomeController::index(),
  '/auth' => AuthController::index(),
  '/auth/register' => RegisterController::index(),
  default => NotFoundController::index()
};