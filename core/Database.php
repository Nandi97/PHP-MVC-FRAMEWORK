<?php

/** User:Alvin Kigen */

namespace app\core;

/**
 * Class Database
 * 
 * @author Alvin Kigen <cartezalvin@gmail.com>
 * @package app\core
 */
class Database
{
  public \PDO $pdo;
  /**
   * Database constructor.
   */
  public function __construct(array $config)
  {
    $db_type = $config['db_type'] ?? '';
    $db_host = $config['db_host'] ?? '';
    $db_port = $config['db_port'] ?? '';
    $db_name = $config['db_name'] ?? '';
    $db_user = $config['db_user'] ?? '';
    $db_pass = $config['db_pass'] ?? '';
    $dsn = $db_type . ':host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_name;
    $this->pdo = new \PDO($dsn, $db_user, $db_pass);
    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  }

  public function applyMigrations()
  {
    $this->createMigrationsTable();
    $appliedMigrations = $this->getAppliedMigrations();

    $newMigrations = [];
    $files = scandir(Application::$ROOT_DIR . '/migrations');
    $toApplyMigrations = array_diff($files, $appliedMigrations);
    foreach ($toApplyMigrations as $migration) {
      if ($migration === '.' || $migration === '..') {
        continue;
      }

      require_once Application::$ROOT_DIR . '/migrations/' . $migration;
      $className = pathinfo($migration, PATHINFO_FILENAME);
      $instance = new $className();
      $this->log("Applying migration $migration");
      $instance->up();
      $this->log("Applied migration $migration");
      $newMigrations[] = $migration;
    }

    if (!empty($newMigrations)) {
      $this->saveMigrations($newMigrations);
    } else {
      $this->log("All  migrations are applied");
    }
  }

  public function createMigrationsTable()
  {
    $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
      id INT AUTO_INCREMENT PRIMARY KEY,
      migration VARCHAR(255),
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    ) ENGINE=INNODB;");
  }

  public function getAppliedMigrations()
  {
    $statement = $this->pdo->prepare("SELECT migration FROM migrations");
    $statement->execute();

    return $statement->fetchAll(\PDO::FETCH_COLUMN);
  }

  public function saveMigrations(array $migrations)
  {
    $str = implode(",", array_map(fn ($m) => "('$m')", $migrations));
    $statement = $this->pdo->prepare("INSERT INTO migrations(migration) VALUES
$str
    ");
    $statement->execute();
  }

  protected function log($message)
  {
    echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
  }
}