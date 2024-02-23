<?php

namespace MD\dbhelper;
use MD\dbhelper\config;
use PDOException;

    class Database {
        /**
         * PDO instance
         * @var type
         */

         private \PDO $pdo;

         private const HASH_ALGO = PASSWORD_DEFAULT;

         private const ENCRYPTION_COST = ['cost' => 11];

         public function __construct() 
         {
            try {
              $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
            } catch(PDOException $e) {
                echo "Error with loading database: " . $e->getMessage();
            }

            return $this->pdo;
            
         }

         public function connect() {
            
         }

         protected static function select($query) {
            try {
              
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