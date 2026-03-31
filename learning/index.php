<!DOCTYPE html>
<html>
<head>
    <title>PHP Try Catch Form</title>
</head>
<body>

<h2>Age Validation Form</h2>

<form method="POST" action="">
    Enter Age:
    <input type="text" name="age">
    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $age = $_POST['age'];

        if (empty($age)) {
            throw new Exception("Age is required");
        }

        if (!is_numeric($age)) {
            throw new Exception("Age must be a number");
        }

        if ($age < 18) {
            throw new Exception("You must be 18+");
        }

        if ($age > 100) {
            throw new Exception("Age too high");
        }

        echo "<p style='color:green;'>Form submitted successfully ✅</p>";

    } catch (Exception $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

</body>
</html>