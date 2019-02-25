<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newark_it";
$CARTID = $_POST['CARTID'];
$TSTATUS = $_POST['TSTATUS'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE cart SET TSTATUS='$TSTATUS' WHERE CARTID='$CARTID'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	
	{
		header('location:status.php');
	}

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
