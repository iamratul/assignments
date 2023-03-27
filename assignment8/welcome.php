<?php
// Get user email for display
$email = $_GET['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <div class="box">
                    <a href="login.php">Logout</a>
                    <blockquote>
                        <p><em>Welcome! <b><?php echo $email; ?></b></em></p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</body>

</html>