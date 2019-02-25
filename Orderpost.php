<?php 
	session_start();

	include("config.php");


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "newark_it";

	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (mysqli_connect_errno())
  	{
    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	} 


 
	$username= $_SESSION['name'];
	$pid=$_SESSION['pid'];

	$cartid=0;
	$query3 = "SELECT * FROM CUSTOMER Where CUSERNAME='$username'";
		$response3 = mysqli_query($conn,$query3);
		$cid=0;
		if($row3 = $response3->fetch_assoc())
		{	
			$cid.=$row3["CID"];
			#print_r($row1["CID"]);
		}
		else
		{
			echo "bad query3";
		}
		$_SESSION['cid']=$cid;
		$query4 ="SELECT * FROM CART AS C, APPEARS_IN AS A WHERE C.CARTID=A.CARTID AND C.CID='$cid' AND A.PID='$pid' ";
		$response4=mysqli_query($conn,$query4);
		if($row4 = $response4->fetch_assoc())
		{	
			$cartid.=$row4["CARTID"];
			#print_r($row1["CID"]);
		}
		else
		{
			echo "bad query4";
		}
	$_SESSION['cartid']=$cartid;
  	if(!empty($_GET['order']))
  	{
  		$query00="DELETE FROM CART WHERE CARTID='$cartid'";
  		$response00 = mysqli_query($conn,$query00);

  		$query0="DELETE FROM APPEARS_IN WHERE CARTID='$cartid'";
  		$response0 = mysqli_query($conn,$query0);

  		$_SESSION['registration_done'] = false;
		if(!$response0)
			echo "wrong query";
		else
		{
		
			$_SESSION['registration_done']=true;
		
		}
		if($_SESSION['registration_done']==true)
		{
			header('location:Dashboard.php');
		}

  	}
  	else
  	{	
  		$pq=0;
  		$query1="SELECT * FROM PRODUCT WHERE PID='$pid'";
		$response1 = mysqli_query($conn,$query1);
		if($row1 = $response1->fetch_assoc())
		{	
			$pq =$row1["PQUANTITY"];
		}
		else
		{
			echo "bad query1";
		}

		$A="Awaiting Response";
		$query2="UPDATE CART SET TSTATUS ='$A' WHERE CARTID = '$cartid'";
		$response2 = mysqli_query($conn,$query2);
		$pq=$pq-1;
  		$query="UPDATE PRODUCT SET PQUANTITY ='$pq' WHERE PID = '$pid'";
		$response = mysqli_query($conn,$query);
		$_SESSION['registration_done'] = false;
		if(!$response)
			echo "wrong query";
		else
		{
		
			$_SESSION['registration_done']=true;
		
		}
		if($_SESSION['registration_done']==true)
		{
			header('location:Order.php');
		}

  	}
	
 ?>