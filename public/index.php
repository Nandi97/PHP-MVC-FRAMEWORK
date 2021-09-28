<?php

/** User: Alvin Kigen */

use app\controllers\AuthController;
use \app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
  'db' => [
    'db_type' => $_ENV['DB_TYPE'],
    'db_host' => $_ENV['DB_HOST'],
    'db_port' => $_ENV['DB_PORT'],
    'db_name' => $_ENV['DB_NAME'],
    'db_user' => $_ENV['DB_USER'],
    'db_pass' => $_ENV['DB_PASS'],
  ]
];

$app = new Application(dirname(__DIR__), $config);


$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();