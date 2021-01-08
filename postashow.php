<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$titleErr = $descriptionErr = $photoErr = $priceErr = "";
$title = $description = $photo = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
    $titleErr = "Title is required";
  } else {
    $title = test_input($_POST["title"]);
  }
  
  if (empty($_POST["description"])) {
    $descriptionErr = "Description is required";
  } else {
    $description = test_input($_POST["description"]);
  }
    
  if (empty($_POST["photo"])) {
    $photo = "";
  } else {
    $photo = test_input($_POST["photo"]);
  }

  if (empty($_POST["price"])) {
    $price = "";
  } else {
    $price = test_input($_POST["price"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
	
	

<h2>Post A Job</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Title: <input type="text" name="title">
  <span class="error">* <?php echo $titleErr;?></span>
  <br><br>
  Description: <input type="text" name="description">
  <span class="error">* <?php echo $descriptionErr;?></span>
  <br><br>
  photo: <input type="text" name="photo">
  <span class="error"><?php echo $photoErr;?></span>
  <br><br>
  price: <textarea name="price" ></textarea>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $title;
echo "<br>";
echo $description;
echo "<br>";
echo $photo;
echo "<br>";
echo $price;
?>

</body>
</html>