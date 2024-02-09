<?php

    namespace models;

    class User {
        public readonly string $username;

        public function __construct($username)
        {
            $this->username = $username;
        }
    }