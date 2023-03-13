<?php
// Validate form inputs
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
  echo "Error: All fields are required";
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Error: Invalid email format";
}

// Save profile picture to server
date_default_timezone_set("Asia/Dhaka");
$uploads_dir = 'uploads/';
$filename = date("Y-m-d-h-i-sa") . '_' . $_FILES['profile_picture']['name'];
$tmp_name = $_FILES['profile_picture']['tmp_name'];
move_uploaded_file($tmp_name, $uploads_dir . $filename);

// Save user's name, email, and profile picture filename to CSV file
$csv_file = 'users.csv';
$data = array($name, $email, $filename);
$file_exists = file_exists($csv_file);
$fp = fopen($csv_file, 'a');
if (!$file_exists) {
  fputcsv($fp, array('Name', 'Email', 'Profile Picture'));
}
fputcsv($fp, $data);
fclose($fp);

// Start session and set cookie with user's name
session_start();
setcookie('name', $name, time() + 3600);

// Redirect to table page
header('Location: table.php');
exit;
