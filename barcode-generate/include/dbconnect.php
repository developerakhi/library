
<?php 	

// For Localhost
$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "library";



// db connection
$connection = new mysqli($localhost, $username, $password, $databaseName);
// check connection
if($connection->connect_error) {
  die("Connection Failed : " . $connection->connect_error);
} else {
  // echo "Successfully connected";
}

?>