<?php
	$conn = mysqli_connect("localhost","root","","newark_it");
	session_start();
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>



<?php
	
	$PID = $_POST['PID'];
	$PTYPE = "LAPTOP";
	$PNAME = $_POST['PNAME'];
	$PPRICE= $_POST['PPRICE'];
	$DESCRIPTION = $_POST['DESCRIPTION'];    
	$PQUANTITY = $_POST['PQUANTITY'];
	$BTYPE = $_POST['BTYPE'];
	$WEIGHT = $_POST['WEIGHT'];
 
	#echo "MY USERNAME IS".$username." <br/> AND MY PASSWORD IS ".$password;
	
	
	
	$response=mysqli_query($conn, "SELECT * FROM product Where PID='$PID' ");
   	$rowcount=mysqli_num_rows($response);
	
	
	if($rowcount>0){
$x=mysqli_query($conn, "UPDATE product SET PQUANTITY=PQUANTITY+$PQUANTITY Where PID='$PID' ");		
	echo "product updated";
	}
	else {
$x=mysqli_query($conn, "INSERT INTO product(PID, PTYPE, PNAME, PPRICE, DESCRPTION, PQUANTITY) VALUES ('$PID', '$PTYPE', '$PNAME', '$PPRICE', '$DESCRPTION', '$PQUANTITY') ");
	echo "product added";
	$z=mysqli_query($conn,	"INSERT INTO `laptop`(`PID`, `BTYPE`, `WEIGHT`) VALUES ('$PID','$BTYPE','$WEIGHT')");
	}


 
	
	$_SESSION['product_added'] = false;
	if(!$x)
		echo "wrong query";
	else
	{
		
		$_SESSION['product_added']=true;
		
	}
	if($_SESSION['product_added']==true)
	{
		header('location:main1.php');
	}

?>