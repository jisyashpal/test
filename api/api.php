<?php
include('../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    echo '<h1> yashpal </h1>';
    // $query = "SELECT * FROM `user`";
    // $result = mysqli_query($conn, $query);
    // $users = [];
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         $users[] = $row;
    //     }
    // }
    // echo json_encode([
    //     "status" => true,
    //     "message" => "GET request successful",
    //     "data" => [
    //         "users" => $users
    //     ]
    // ]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && $_POST['submit'] === 'login') {

    $email = $_POST['email'];
    $password = $_POST['pass'];

    if ($email === '' || $password === '') {
        $_SESSION['msg'] = 'Email and Password cannot be empty.';
        header('location:index.php');
        exit();
    } else {

        $query = "SELECT * FROM `username` WHERE `email`='$email' and `password`='$password'";
        $run = mysqli_query($conn, $query);
        $num = mysqli_num_rows($run);

        if ($num) {
            $data = mysqli_fetch_assoc($run);
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['role'] = 'Admin';

            echo '<script type="text/javascript">
			alert("Login successful!");
			window.location.href = "dashboard.php";
			</script>';
            exit();
        } else {
            $_SESSION['msg'] = 'Invalid details !!!';
            echo '<script type="text/javascript">
			alert("Invalid email or password!");
			window.location.href = "index.php";
		   </script>';
            exit();
        }
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid request method"
    ]);
    exit();
}
