<?php

namespace database;


    class SQLConnection {
        /**
         * PDO instance
         * @var type
         */

         private $pdo;

         /**
          * return pdo connection to sqlite
          * @return \PDO
          */
          public function connect() {
            if ($this->pdo == null) {
                $this->pdo = new \PDO("sqlite://todoDB.sqlite3");
            }

            return $this->pdo;
          }
    }