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

  public function query($sql, $params=[]) {
    $stmt = self::$pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
  }

  protected function selectAll($table, $params=[]) {
      $sql = "SELECT * FROM `{$table}`";
      $stmt = $this->query($sql, $params);

      while($row = $stmt->fetch()) {
          yield $row;
      }
  }

  
  protected function select($columns, $table, $optionalWhere="", $optionalWhereClause="", $params=[]) {
      $sql = "SELECT `{$columns}` FROM `{$table}`";
      if($optionalWhere == "WHERE") {
          $sql = $sql . $optionalWhere . $optionalWhereClause;
      }
      $sql = $sql . ";";
    try {
      $stmt = self::$pdo->prepare($sql);
      if(empty($params)) {
        $stmt->execute();
      } else {
        $stmt->execute($params);
      }
    } catch(PDOException $e) {
       echo $e->getMessage() . "<br>";
    }

      while($row = $stmt->fetch()) {
         yield $row;
      }
  }

  protected function update($columnsAndValues, $table, $condition, $params) {
      $sql = "UPDATE `{$table}` SET `{$columnsAndValues}` WHERE `{$condition}`;";

      $stmt = self::$pdo->prepare($sql);

      $stmt->bindParam($params);

      try {
         $stmt->execute();
      } catch(PDOException $e) {
          echo $e->getMessage() . "<br>";
      }

      echo "{$table} is successfully updated!";
      
      /*
    if($stmt->execute()) {
       echo "{$table} is successfully updated!";
    } else {
        throw new Exception("Failed to update {$table}");
    }*/
  }

  protected function delete($table, $condition, $params) {
      $sql = "DELETE FROM {$table} WHERE {$condition}";
      $stmt = self::$pdo->prepare($sql);
      $stmt->bindParam($params);

      try {
        $stmt->execute();
      } catch(PDOException $e) {
         echo $e->getMessage() . "<br>";
      } 

      echo "record(s) was deleted successfully";
      /*
      if($stmt->execute()) {
          echo "record(s) was deleted successfully";
      } else {
          throw new Exception("Record(s) has failed to delete");
      }*/
  }





      

     
  /*
  protected function select(string|array $table)
  {
    $sql = "";
    if (empty($table)) {
      throw new ValueError("Select statement must not be empty");
    }

      if(is_string($table)) {
          $sql ="SELECT * FROM {$table}";
      }

      if(is_array($table)) {
          if($table[0] != "SELECT") {
             throw new Exception("Must have keyword select");
          }
          
          for($i = 0; $i < count($table); $i++) {
              if(!str_contains($table[$i], "FROM")) {
                  throw new Exception("Must contain the word")
              }
          }
      }

    $stmt = self::$pdo->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
      yield $row;
    }
  }*/




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
