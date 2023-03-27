<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
            <div class="column column-80 column-offset-10">
                <div class="box">
                    <h1>Registration Form</h1>
                    <?php
                    // Check if form is submitted
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        // Get form values
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];

                        // Validation
                        $errors = array();

                        if (empty($first_name)) {
                            $errors[] = "First name is required.";
                        }

                        if (empty($last_name)) {
                            $errors[] = "Last name is required.";
                        }

                        if (empty($email)) {
                            $errors[] = "Email address is required.";
                        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errors[] = "Invalid email address format.";
                        }

                        if (empty($password)) {
                            $errors[] = "Password is required.";
                        } elseif ($password != $confirm_password) {
                            $errors[] = "Passwords do not match.";
                        }

                        // If there are no errors, display confirmation message
                        if (empty($errors)) {
                            echo "<p class='success'>Thank you for registering, $first_name!</p>";
                            echo "<a href='index.php' class='button'>Back To Home</a> <span>Or</span>
                                  <a href='login.php' class='button'>Log In</a>";
                            exit;
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
                        <div class="row">
                            <div class="column">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name">
                            </div>

                            <div class="column">
                                <label for="last_name">Last Name:</label>
                                <input type="text" name="last_name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label for="email">Email Address:</label>
                                <input type="email" name="email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label for="password">Password:</label>
                                <input type="password" name="password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" name="confirm_password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <input type="submit" value="Register">
                                <span>Or</span>
                                <a href='login.php' class='button'>Log In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>