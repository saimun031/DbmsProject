<!DOCTYPE html>
<?PHP
    session_start();
?>
<html>
<head>
	<title>My Posted Jobs</title>
	
 <link rel="stylesheet" type="text/css" href="style.css">

<style>
body {
  background-image: url('about.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
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
    
    
<div class="container">
    <?PHP
        if($_SESSION['usertype'] == 0){
            echo '<h2>My Posted Jobs</h2>';
        } else {
            echo '<h2>My Taken Jobs</h2>';
        }
    ?>
    <div class="items-container col-md-12" style="border: dot-dash;">
        <ul class="list-group col-md-11">
            <?PHP

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
            $userId = $_SESSION['userid'];
            $query = "";

            if($_SESSION['usertype'] == 0){
                $query = "SELECT aj.id, aj.title, aj.description, aj.price,aj.takerid,us.username FROM alljobs as aj
                          left join users as us on us.id = aj.takerid WHERE posterid ='$userId'";
            } else {
                $query = "SELECT aj.id, aj.title, aj.description, aj.price,aj.posterid,us.username FROM alljobs as aj
                          left join users as us on us.id = aj.posterid WHERE takerid ='$userId'";
            }

            $result = mysqli_query($conn, $query);

            while ($row = $result->fetch_assoc()) {
                echo '<li class="list-group-item">';
                ?>
                <div>
                    <div class="col-md-10">
                        <h4><?PHP echo $row["title"]; ?></h4>
                    </div>
                    <div class="col-md-10">
                        <?PHP if($_SESSION['usertype'] == 0){ ?>
                        <h4>Taken By: <?PHP echo is_null($row["username"]) ? 'NONE' : $row["username"]; ?></h4>
                        <?PHP } else { ?>
                        <h4>Posted By: <?PHP echo is_null($row["username"]) ? 'NONE' : $row["username"]; ?></h4>
                        <?PHP } ?>
                    </div>
                    <div class="col-md-1">
                        <h5 class="pull-right">Tk: <?PHP echo $row["price"]; ?></h5>
                    </div>
                    <div class="col-md-10">
                        <h5 class="pull-right">Patients Details Drive Url: </h5>
                        <span>
                            <?PHP echo $row["description"]; ?>
                        </span>
                    </div>
                    <div>
                        <?PHP if($_SESSION['usertype'] == 1){ ?>
                            <a class="btn btn-primary" href="postajob.php?deniedjobid=<?PHP echo $row["id"]; ?>">Deny This Job</a>
                        <?PHP } ?>

                    </div>
                </div>
                <?PHP
                echo '</li>';
            }
            mysqli_free_result($result);
            ?>
        </ul>
    </div>
    <?PHP
        if($_SESSION['usertype'] == 1) {
            echo '<h2>Other available Jobs</h2>';
    ?>
            <div class="items-container col-md-12" style="border: dot-dash;">
                <ul class="list-group col-md-11">
                    <?PHP

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
                    $userId = $_SESSION['userid'];
                    $query = "";

                    $query = "SELECT aj.id, aj.title, aj.description, aj.price,aj.posterid,us.username FROM alljobs as aj
                          left join users as us on us.id = aj.posterid WHERE takerid is NULL";

                    $result = mysqli_query($conn, $query);

                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="list-group-item">';
                        ?>
                        <div class="col-md-11">
                            <div class="col-md-10">
                                <h4><?PHP echo $row["title"]; ?></h4>
                            </div>
                            <div class="col-md-10">
                                <?PHP if($_SESSION['usertype'] == 0){ ?>
                                    <h4>Taken By: <?PHP echo is_null($row["username"]) ? 'NONE' : $row["username"]; ?></h4>
                                <?PHP } else { ?>
                                    <h4>Posted By: <?PHP echo is_null($row["username"]) ? 'NONE' : $row["username"]; ?></h4>
                                <?PHP } ?>
                            </div>
                            <div class="col-md-1">
                                <h5 class="pull-right">Tk: <?PHP echo $row["price"]; ?></h5>
                            </div>
                            <div class="col-md-10">
                                <h5 class="pull-right">Patients Details Drive Url: </h5>
                                <span>
                                    <?PHP echo $row["description"]; ?>
                                </span>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="postajob.php?takenjobid=<?PHP echo $row["id"]; ?>">Take This Job</a>
                            </div>
                        </div>
                        <?PHP
                        echo '</li>';
                    }
                    mysqli_free_result($result);
                    ?>
                </ul>
            </div>
    <?PHP
        } else {
            echo '<a class="btn btn-primary" href="postajob.php">Post A Job</a>';
        }
    ?>
</div>
</body>
</html>