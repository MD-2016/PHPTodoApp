<?php

    function validateLoginFields($username, $pass) : bool {
        if((!$username) || (!$pass)) 
        {
            $error = "Please fill in all fields for processing the login";
            echo $error;
            return false;
        }

        if(!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $error = "Enter a valid username using your email";
            echo $error;
            return false;
        }

        return true;
    }

    function validateRegisterFields($username, $email, $pass, $validatepassword): bool {
        if((!$username) || (!$email) || (!$pass) || (!$validatepassword)) {
            $error = "Please leave no fields blank";
            echo $error;
            return false;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Enter a valid email address";
            echo $error;
            return false;
        }

        if(strlen($pass) > 25 || strlen($pass) < 8) {
            $error = "Password must be between 8 to 25 characters";
            echo $error;
            return false;
        }

        if(strlen($validatepassword) > 25 || strlen($validatepassword) < 8) {
            $error = "Validate Password must be between 8 to 25 characters";
            echo $error;
            return false;
        }

        if($pass != $validatepassword) {
            $error = "Passwords must match";
            echo $error;
            return false;
        }

        return true;
    }