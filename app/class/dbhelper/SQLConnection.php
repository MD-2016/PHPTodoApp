<?php

namespace MD\dbhelper;
use MD\dbhelper\config;
use PDOException;

    class SQLConnection {
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
                echo "Error with loading database: " . $e;
            }
            
         }

         /**
          * return pdo connection to sqlite
          * @return \PDO
          */
          public  function connect() {
            try{
                $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
            } catch(\PDOException $e) {
              
              echo "Error with loading database: " . $e;
            } 

            return $this->pdo;
          }

          /**
           * add user to the database query
           * @return boolean 
           */
          public function addUserQuery($username, $password) {


              $encryptedPass = password_hash($password, PASSWORD_DEFAULT, self::ENCRYPTION_COST);

              $query = 'INSERT INTO `users` (`username`, `password`) VALUES(:username, :password)';
              $stmt = $this->pdo->prepare($query);

              $stmt->execute([
                  ':username' => $username,
                  ':password' => $encryptedPass
              ]);

              return $stmt;
          }
    }