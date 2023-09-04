<?php
//Database connectivity
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_address_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $name = $_POST["name"];
    $address = $_POST["address"];

    $Sql = "INSERT INTO users (name) VALUES ('$name')";
    $conn->query($Sql);


    $userId = $conn->insert_id;

    $Sql_add = "INSERT INTO addresses (user_id, address_text) VALUES ('$userId', '$address')";
    $conn->query($Sql_add);

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>
        <label for="address">Address:</label>
        <textarea name="address" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

