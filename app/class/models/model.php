<?php

    namespace MD\models;
    use MD\dbhelper\Database;
    use PDOException;

    abstract class Model {
        protected $pdo;

        public function __construct() {
            $pdo = new Database;
            try {
                $pdo->__construct();
            } catch(PDOException $e) {
                echo "Database could not connect: " . $e;
            }

            return $pdo;
        }
    }