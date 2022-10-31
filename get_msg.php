<?php
//
$localhost = '127.0.0.1';
$user = 'mutall';
$password = 'mutall';
$database = 'mutall_users';
//
$conn = new PDO("mysql:host=$localhost;dbname=$database", $user, $password);
//
//Set the PDO error mode to exception.
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
$stmt = $conn->prepare("SELECT * FROM msg");
$stmt->execute();
//
//Set the resulting array to associative.
$stmt->setFetchMode(PDO::FETCH_ASSOC);
//
foreach($stmt->fetchAll() as $k=>$v) {
    echo json_encode($v, JSON_PRETTY_PRINT);
  }
