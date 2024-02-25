<?php
    include "../../vendor/autoload.php";
    use MD\dbhelper\Database;
    use MD\helpers\Validate;
    use MD\models\Model;
    use MD\models\User;

    public function find_user_by_username($username) {
        $sql = "SELECT `username`, `password` FROM `users` WHERE `username=:username";

        $stmt = self::  
    }

    public function is_user_logged_in() {
        return isset($_SESSION['username']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <script src="../../scripts/closemodal.js"></script>
    <title>Login Page</title>
</head>
<body>

    <!-- Button to open modal-->
    <button onclick="document.getElementById('loginModal').style.display='block'">Login</button>
    <div class="modal" id="loginModal">
        <span onclick="document.getElementById('loginModal').style.display='none'" class="close" title="Close Login">&times;</span>
   <form action="" method="post" class="modal-content animate">
    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" id="" name="uname" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
    </div>
    <div class="btncontainer">
        <button type="button" onclick="document.getElementById('loginModal').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
    </form>
    </div>
</body>
</html>