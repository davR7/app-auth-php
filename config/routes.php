<?php
$routes = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

use App\Controller\ {
  AuthController,
  HomeController,
  NotFoundController
};

echo $match = match ($routes) {
  '/' => HomeController::index(),
  '/auth' => AuthController::index(),
  default => NotFoundController::index()
};