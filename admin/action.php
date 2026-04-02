<?php
$conn = new mysqli("localhost", "root", "", "test");

// print_r($_POST);



if (isset($_POST['submit']) && $_POST['submit'] === 'signup') {
    // Get form data
    // print_r($_POST);
    $email = htmlspecialchars($_POST['email'] ?? '');
    $username = htmlspecialchars($_POST['username'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');
    $status = 1;

    // Format data
    $quarry = "INSERT INTO user (username, email, password, status) VALUES ('$username', '$email', '$password', $status)";
    // Execute query
    // print_r($quarry);
    // die();
    $run = mysqli_query($conn, $quarry);
    if ($run) {
        // Redirect (NO echo before header)
        header("Location: index.php?success=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }


    // echo "Form submitted successfully!<br>";
    echo "<script>alert('Form submitted successfully!');</script>";
     header("Location: index.php?success=1");
} else {
    echo "Form not submitted.";
}

if (isset($_POST['submit']) && $_POST['submit'] === 'login') {
    // Get form data
    // print_r($_POST);
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');
    $status = 1;

    // Format data
    $quarry = "INSERT INTO user ( email, password, status) VALUES ('$email', '$password', $status)";
    // Execute query
    print_r($quarry);
    die();
    $run = mysqli_query($conn, $quarry);
    if ($run) {
        // Redirect (NO echo before header)
        header("Location: index.php?success=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // echo "Form submitted successfully!<br>";
    echo "<script>alert('Form submitted successfully!');</script>";
    header("Location: index.php");
} else {
    echo "Form not submitted.";
}
