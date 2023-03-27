<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body {
            margin-top: 40px;
        }

        .box {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding: 20px;
        }

        .error {
            color: #DB1F48;
        }

        .success {
            color: #18A558;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-50 column-offset-25">
                <div class="box">

                    <h1>Login Form</h1>

                    <?php
                    // Check if form is submitted
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        // Get form values
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        // Validation
                        $errors = array();

                        if (empty($email)) {
                            $errors[] = "Email address is required.";
                        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errors[] = "Invalid email address format.";
                        }

                        if (empty($password)) {
                            $errors[] = "Password is required.";
                        }

                        // If there are no errors, redirect to welcome page
                        if (empty($errors)) {
                            // User exists, redirect to welcome page
                            $_SESSION['email'] = $email;
                            header("Location: welcome.php");
                            exit();
                        } else {
                            // Invalid login credentials
                            $errors[] = "Invalid email address or password.";
                        }

                        // If there are errors, display them
                        echo "<ul class='error'>";
                        foreach ($errors as $error) {
                            echo "<li>$error</li>";
                        }
                        echo "</ul>";
                    }
                    ?>

                    <form method="post" action="">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email"><br>

                        <label for="password">Password:</label>
                        <input type="password" name="password"><br>

                        <input type="submit" value="Login">
                        <span>Or</span>
                        <a href='index.php' class='button'>Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
