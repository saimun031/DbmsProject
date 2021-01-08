<?php
if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
    $sql = "CREATE DATABASE if not exists myDB";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    $conn->close();

    $conn = new mysqli($servername, $username, $password, "myDB");
    $sql = "CREATE TABLE if not exists AllJobs (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(300) NOT NULL,
        description VARCHAR(1000) NOT NULL,
        photo VARCHAR(50),
        price INT(6),
        takerid VARCHAR(50),
        posterid VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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