<?php

  namespace MD\helpers;

  class Validate {
    static function username($input, $required=true) {
        $errors = [];

        if(!$input && $required) {
            $errors[] = 'Username is required';
        }

        if($input && !$errors && !filter_var($input, htmlentities($input, ENT_DISALLOWED, "UTF-8"))) {
            $errors[] = 'Username is invalid';
        }

        return $errors ?: true;
    }

    static function password($input, $required=true) {
        $errors = [];
        if(!$input && $required) {
            $errors[] = 'Password is required';
        }

        if(strlen($input) < 8) {
            $errors[] = 'Password must 8 or more characters';
        }
    }

    static function valdiatePassword($input, $required=true) {
        $errors = [];

        if(!$input && $required) {
            $errors[] = 'Validated Password is required';
        }

        if(strlen($input) < 8) {
            $errors[] = 'Validated Password must be 8 or more characters';
        }
    }
  }