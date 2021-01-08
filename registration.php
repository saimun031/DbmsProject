<?php
if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
    $sql = "CREATE DATABASE if not exists " . $dbName;
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    $conn->close();

    $conn = new mysqli($servername, $username, $password, $dbName);
    $sql = "CREATE TABLE if not exists users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(300) NOT NULL,
        email VARCHAR(1000) NOT NULL,
        password VARCHAR(50),
        usertype INT(2)
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

$conn->close();

}
?>

<html>
<body>
<form method="post">
    <input type="text" name="studentname">
    <input type="submit" name="submit" value="click">
</form>
</body>
</html>