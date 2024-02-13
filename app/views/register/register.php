<?php 
    include '../../../vendor/autoload.php';
    use MD\dbhelper\SQLConnection;
    use MD\helpers\Validate;

   $username = $_POST['username'];
   $pass = $_POST['password'];
   $validatePass = $_POST['validatepassword'];
   $required = true;
   $errors = [];

   //variables for validation
   $validatedUsername = false;
   $validatedPassword = false;
   $validatedValidPass = false;

    if(isset($_POST['submit'])) {
        // check the user input before database connection
        $validatedUsername | $errors = Validate::username($username, $required);
        $validatedPassword | $errors = Validate::password($pass, $required);
        $validatedValidPass | $errors = Validate::valdiatePassword($validatePass, $pass, $required);

        if($validatedUsername && $validatedPassword && $validatedValidPass) {
            // code here for success and start database connection and prepared statement
        }

        // deal with printing out errors


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
            </div>
            <div>
               
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
               
                <label for="validatepassword">Validate Password:</label>
                <input type="password" name="validatepassword" id="validatepassword">
            </div>
            <div>
                <button type="submit">Register</button>
                <footer>Already a member? <a href="../login/login.php">Login Here</a></footer>
            </div>
        </form>
    </main>
</body>
</html>