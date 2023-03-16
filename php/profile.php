<?php 


$db = mysqli_connect("localhost", "user", "password", "database_name");

if (isset($_POST['submit_update'])) {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE users SET  name = '$name' age='$age',  WHERE id = '$user_id'";
    mysqli_query($db, $query);
}
?>