<?php

  namespace MD\helpers;

  class Validate {
    static function username($input, $required=true) {
        $errors = [];

        if(empty($input) && $required) {
            $errors[] = 'Username is required';
        }

        if($input && !$errors && !filter_var($input, htmlentities($input, ENT_DISALLOWED, "UTF-8"))) {
            $errors[] = 'Username is invalid';
        }

        return $errors;
    }

    static function password($input, $required=true) {
        $errors = [];
        if(empty($input) && $required) {
            $errors[] = 'Password is required';
        }

        if(strlen($input) < 8) {
            $errors[] = 'Password must 8 or more characters';
        }

        return $errors;
    }

    static function valdiatePassword($input, $pass2, $required=true) {
        $errors = [];

        if(!$input && $required) {
            $errors[] = 'Validated Password is required';
        }

        if(strlen($input) < 8) {
            $errors[] = 'Validated Password must be 8 or more characters';
        }

        if(strcmp($input, $pass2) != 0) {
            $errors[] = 'Passwords dont match';
        }

        return $errors;
    }
  }