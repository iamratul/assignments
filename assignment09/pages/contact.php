<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="nav-section">
                <div class="logo">
                    <a href="index.html">
                        <img src="../images/logo.png" alt="My Blog">
                    </a>
                </div>
                <nav>
                    <ul>
                        <li><a href="../index.html">Home</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="form-box">
        <div class="box">
            <h2>Contact Us</h2>
            <?php
                    // Check if form is submitted
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        // Get form values
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $msg = $_POST['msg'];

                        // Validation
                        $errors = array();

                        if (empty($name)) {
                            $errors[] = "Name is required.";
                        }

                        if (empty($email)) {
                            $errors[] = "Email address is required.";
                        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errors[] = "Invalid email address format.";
                        }

                        if (empty($subject)) {
                            $errors[] = "Subject is required.";
                        }

                        if (empty($msg)) {
                            $errors[] = "Message is required.";
                        }

                        // If there are no errors, display confirmation message
                        if (empty($errors)) {
                            echo "<p class='success'>Thank you for contacting us, $name!</p>";
                            echo "<a href='../index.html' class='button'>Back To Home</a>";
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
            <form action="" method="post">
                <div>
                    <input type="text" name="name" required>
                    <label for="">Name</label>
                </div>
                <div>
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div>
                    <input type="text" name="subject" required>
                    <label for="">Subject</label>
                </div>
                <div>
                    <textarea name="msg" id="" required></textarea>
                    <label for="">Message</label>
                </div>
                <input type="submit" value="Send">
            </form>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>Copyright &copy; 2023. All Rights Reserved. Design by <strong>Ratul Hossain</strong></p>
        </div>
    </footer>
</body>

</html>
