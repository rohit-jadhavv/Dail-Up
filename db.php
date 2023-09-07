<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dailup";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$sql2 = "CREATE TABLE IF NOT EXISTS workers_auth(
  worker_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  worker_uname VARCHAR(50),
  worker_mail VARCHAR(50),
  worker_pass VARCHAR(20)
  )";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->query($sql2) === TRUE) {
  echo "Table Catogories created";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS catogories(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  field VARCHAR(30) NOT NULL
  )";
if ($conn->query($sql) === TRUE) {
  echo "Table Catogories created";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS worker_info  (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    age INT(3) NOT NULL,
    phone INT(9) NOT NULL,
    email VARCHAR(50) NOT NULL,
    about VARCHAR(255) NOT NULL,
    additional_info VARCHAR(255) NOT NULL,
    rating FLOAT(2),
    field_id INT(6) UNSIGNED,
    profile_pic VARCHAR(255) NOT NULL DEFAULT 'user.png',
    FOREIGN KEY (field_id) REFERENCES catogories(id)
    )";

if ($conn->query($sql) === TRUE) {
  echo "Table  worker_info created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();
?>