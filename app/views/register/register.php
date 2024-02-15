<?php 
    include '../../../vendor/autoload.php';
    use MD\dbhelper\SQLConnection;
    use MD\helpers\Validate;

   $required = true;
   $errors = [];
    if(isset($_POST['submit'])) {
        // build an error array just in case 
              $errors = array_filter(['username' => Validate::username($_POST['username'], $required), 
                         'password' => Validate::password($_POST['password'], $required), 
                         'validatepassword' => Validate::valdiatePassword($_POST['validatepassword'], $_POST['password'], $required)]);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <main>
        <form action="" method="post">
            <h1>Sign Up</h1>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <?php
                     if(!empty($errors['username'])) {
                        foreach ($errors['username'] as $error) {
                            echo '<p>', htmlentities($error), '</p>';
                        }
                   }
                ?>
            </div>
            <div>
               
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <?php 
                         if(!empty($errors['password'])) {
                            foreach ($errors['password'] as $error) {
                                echo '<p>', htmlentities($error), '</p>';
                            }
                        }                
                ?>
            </div>
            <div>
               
                <label for="validatepassword">Validate Password:</label>
                <input type="password" name="validatepassword" id="validatepassword">
                <?php
                        if(!empty($errors['validatepassword'])) {
                            foreach ($errors['validatepassword'] as $error) {
                                echo '<p>', htmlentities($error), '</p>';
                            }
                       }     
                ?>
            </div>
            <div>
                <button type="submit">Register</button>
                <footer>Already a member? <a href="../login/login.php">Login Here</a></footer>
            </div>
        </form>
    </main>
</body>
</html>