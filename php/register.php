<?php

$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "userdetails";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = $conn->prepare("INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");
if (mysqli_query($conn, $sql)) {
  echo "Registration successful!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
