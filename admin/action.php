<?php
print_r($_POST);
echo "<br>";
// echo "Form submitted successfully!<br>";
echo "<script>alert('Form submitted successfully!');</script>";
header("Location: ../index.php");
?>