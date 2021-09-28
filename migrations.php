<?php

/**
 * User: Alvin Kigen
 */


/** User: Alvin Kigen */

use app\controllers\AuthController;
use \app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
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

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();