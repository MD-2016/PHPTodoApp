<?php 
    include '../../../vendor/autoload.php';
    use MD\helpers\formcheck\Checker;
    use MD\dbhelper\SQLConnection;

   

    function postInput($htmlName) {
        if(isset($_POST[$htmlName])) {
            return $_POST[$htmlName];
        }

        return null;
    }

    $username = postInput('username');
    $pass = postInput('password');
    $validatePass = postInput('validatepassword');

    public checker = new Checker($username);

    if(isset($_POST['submit'])) {
        $hashedpassword = password_hash($pass, PASSWORD_DEFAULT);

        if(Checker::validateRegisterFields($username, $pass, $validatePass)) {

        }
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
                <span class="error" style="display: none;">Please enter a username</span>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <span class="error" style="display: none;">Please enter a password</span>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <span class="error" style="display: none;">Please enter same password again for verification</span>
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