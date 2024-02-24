<?php

namespace MD\dbhelper;

use ErrorException;
use Exception;
use MD\dbhelper\config;
use PDOException;
use ValueError;

class Database
{
  /**
   * PDO instance
   * @var type
   */

  private static \PDO $pdo;

  private const HASH_ALGO = PASSWORD_DEFAULT;

  private const ENCRYPTION_COST = ['cost' => 11];

  public function __construct()
  {

    if (empty(self::$pdo)) {
      try {
        self::$pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
      } catch (PDOException $e) {
        echo "Error with loading database: " . $e->getMessage();
      }
    }
  }

  protected function select(string|array $table)
  {
    
    if (empty($table)) {
      throw new ValueError("Select statement must not be empty");
    }

    if(is_string($table)) {
        $sql = "SELECT * FROM {$table}";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();

        while($row = $stmt->fetch()) {
           yield $row;
        }

    } else {
      $fixedStatement = implode("`,`", $table);
      $sql = "SELECT `{$fixedStatement}`";
      $stmt = self::$pdo->prepare($sql);
      $stmt->execute();

      while($row = $stmt->fetch()) {
        yield $row;
      }
    }
  }




  /*
          public function addUserQuery(string $username, string $password): bool|int {
            static $query = 'INSERT INTO `user` (`username`, `password`) VALUES(:username, :password)';

            $stmt = $this->pdo->prepare($query);

            if(!$stmt) {
              return false;
            }

            $hash = password_hash($password, self::HASH_ALGO, self::ENCRYPTION_COST);

            $result = $stmt->exec([
               ':username' => $username,
               ':password' => $hash
            ]);

            if(!$result) {
              return false;
            }

            return $this->pdo->lastInsertId();
          } */
}
