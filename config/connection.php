<?php
$conn = new mysqli("localhost","root","","test");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// die();
// $result = $conn->query("SELECT * FROM user");
// echo "<pre>";
// echo $result->num_rows;
// echo "<br>";
// print_r($result->fetch_all(MYSQLI_ASSOC));
// echo "</pre>";  


// Create database
// $sql = "CREATE DATABASE test";
// $sql = "INSERT INTO `user`(`id`, `username`, `email`, `password`, `status`) VALUES ('13','yashpal','yashpal@example.com','password','1')";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }
?>