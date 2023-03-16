<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// check if Redis server is running
if (!$redis->ping()) {
    die("Redis server is not running");
}

// check if the username and password exist in the cache
$username = $_POST['username'];
$password = $_POST['password'];
$cacheKey = "user:$username:password:$password";
if ($redis->exists($cacheKey)) {
    echo "success (from cache)";
} else {
    // establish a connection to the database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "userdetails";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // prepare a query to check if the username and password are correct
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    // fetch the result of the query
    $result = mysqli_stmt_get_result($stmt);

    // check if the result has any rows
    if (mysqli_num_rows($result) > 0) {
        echo "success";
        // add the username and password to the cache
        $redis->set($cacheKey, 1);
        $redis->expire($cacheKey, 60); // expire the cache after 1 minute
    } else {
        echo "Invalid username or password";
    }

    // close the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// close the Redis connection
$redis->close();
?>