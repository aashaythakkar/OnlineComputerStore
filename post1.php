<?php
	$conn = mysqli_connect("localhost","root","","newark_it");
	session_start();
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>



<?php
	
	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];
	$Email = $_POST['Email'];
	$Address= $_POST['Address'];
	$Phone = $_POST['Phone'];    
	$username = $_POST['Username'];
	$password = $_POST['Password'];
 
	#echo "MY USERNAME IS".$username." <br/> AND MY PASSWORD IS ".$password;
	$response=mysqli_query($conn, "SELECT * FROM CUSTOMER ");
   	$rowcount=mysqli_num_rows($response);
	#echo $rowcount;
	$cid =1000 + $rowcount+1-2;
	$_SESSION['cid']=$cid;
	$qry = mysqli_query($conn, "INSERT into CUSTOMER (CID, FNAME, LNAME, EMAIL, ADDRESS, PHONE, CSTATUS, CUSERNAME, CPASSWORD) values('$cid', '$Fname', '$Lname', '$Email','$Address', '$Phone', '','$username', '$password');");

	$_SESSION['registration_done'] = false;
	if(!$qry)
		echo "wrong query";
	else
	{
		
		$_SESSION['registration_done']=true;
		
	}
	if($_SESSION['registration_done']==true)
	{
		header('location:login.php');
	}

?>