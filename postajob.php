<?php
session_start();
if(isset($_GET['takenjobid']) || isset($_GET['deniedjobid'])){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dbName = "myDB";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $takenJobId = $_GET['takenjobid'];
    $userId = $_SESSION['userid'];

    $sql = "";
    if(isset($_GET['takenjobid'])){
        $sql = "UPDATE AllJobs set takerid = ".$userId." WHERE id = " .$takenJobId;
    } else {
        $sql = "UPDATE AllJobs set takerid = NULL WHERE id = " .$_GET['deniedjobid'];
    }
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "query done successfully";
    } else {
        echo "query error: " . $conn->error;
    }
    $conn->close();
    header('location: myjobs.php');
}
if(isset($_POST['submit'])){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dbName = "myDB";
    echo "Genjam,";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $photo = $_POST['photo'];
    $price = $_POST['price'];
    $userId = $_SESSION['userid'];
    $sql = "INSERT into AllJobs 
        (title, description, photo, price, posterid)
        VALUES
        ('" . $title ."','" . $desc ."','" . $photo ."'," . $price .",'" .$userId . "')
    ";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
    header('location: myjobs.php');
	} 

?>

<html>
<head>
	<title>JobPost</title>
<style>
body {
  background-image: url('about.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

h1 {
    text-align: center;
}
</style>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CareGiver System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="logout.php">LogOut</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    
<a class="btn btn-primary" href="myjobs.php">See All My Jobs</a>
<div class="container">
    <form class="col-md-12" method="post" action="postajob.php">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="description">Patients Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Enter Description for Patients Dvive url for all info with CV, NID & Others." rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="Photo">Your Info</label>
            <input type="text" class="form-control" id="photo" name="photo"  placeholder="Please enter Your Dvive url for all info with CV, NID & Others.">
        </div>
        <div class="form-group">
            <label for="Photo">Amount</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Please enter Taka">
        </div>
        <button type="submit" name="submit" class="btn btn-primary" value="click">Submit</button>
    </form>
</div>

	

</body>
</html>