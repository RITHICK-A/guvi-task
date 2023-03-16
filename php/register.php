<?php
// Get the form data
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "userdetails";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check for errors
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert the data into the database
$sql = $conn->prepare("INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");
if (mysqli_query($conn, $sql)) {
  echo "Registration successful!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
