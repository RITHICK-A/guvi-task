<?php


$url = 'mongodb://localhost:27017';
$dbName = 'userdetails';


$client = new Mongodb\Client($url);


$users = $client->selectCollection($dbName, 'users');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $userData = [
    'name' => $_POST['name'],
    'age' => $_POST['age'],
  ];

  
  $result = $users->insertOne($userData);

  if ($result->getInsertedCount() === 1) {
    echo 'User created successfully';
  } else {
    echo 'Failed to create user';
  }
}
?>