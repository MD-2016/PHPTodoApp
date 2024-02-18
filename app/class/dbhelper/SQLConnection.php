<?php

namespace MD\dbhelper;
use MD\dbhelper\config;


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
          public  function connect() {
            if ($this->pdo == null) {
                $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
            }

            return $this->pdo;
          }
    }