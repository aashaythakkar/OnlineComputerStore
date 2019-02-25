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
  	  		$pid= $_GET['pid'];
	$username= $_SESSION['name'];
	$_SESSION['pid']=$pid;
	#getting cid for username
	$cartid=10000;
	$query ="SELECT * FROM CART";
	$response=mysqli_query($conn,$query);
	$rowcount=mysqli_num_rows($response);
	if($rowcount==0)
	{
		$cartid=10000;
	}
	else
	{
		$cartid+=$rowcount+1;
	}
	#echo $cartid;
	$query1 = "SELECT * FROM CUSTOMER Where CUSERNAME='$username'";
	$response1 = mysqli_query($conn,$query1);
	$cid="";
	if($row1 = $response1->fetch_assoc())
	{	
		$cid.=$row1["CID"];
		#print_r($row1["CID"]);
	}
	else
	{
		echo "bad query1";
	}
	$SAname="";
	$query2="SELECT * FROM SHIPPING_ADDRESS WHERE CID='$cid'";
	$response2 = mysqli_query($conn,$query2);
	if($row2 = $response2->fetch_assoc())
	{	
		$SAname.=$row2["SANAME"];
		#print_r($row2["SANAME"]);
	}
	else
	{
		echo "bad query2";
	}
	#echo $SAname;
	$ccnum="";
	$query3 = "SELECT * FROM STORED_CARD WHERE CID='$cid'";
	$response3 = mysqli_query($conn,$query3);
	if($row3 = $response3->fetch_assoc())
	{	
		$ccnum.=$row3["CCNUMBER"];
		#print_r($row3["CCNUMBER"]);
	}
	else
	{
		echo "bad query3";
	}
	#echo $ccnum;
	$quantity_in_cart=1;
	$pq=0;
	$price=0;
	#getting quantity from product
	$query4="SELECT * FROM PRODUCT WHERE PID='$pid'";
	$response4 = mysqli_query($conn,$query4);
	if($row4 = $response4->fetch_assoc())
	{	
		$pq =$row4["PQUANTITY"];
		$price = $row4["PPRICE"];
		#print_r($row4["PQUANTITY"]);
	}
	else
	{
		echo "bad query3";
	}
	$pq=$pq-$quantity_in_cart;
	#echo $price;
	#echo $pq;
	#updating quantity in product table
	#$query5="UPDATE PRODUCT SET PQUANTITY ='$pq' WHERE PID = '$pid'";
	#$response5 = mysqli_query($conn,$query5);

	#echo "update done";
	$query6="INSERT INTO CART (CARTID, CID, SANAME, CCNUMBER, TSTATUS, TDATE) VALUES ('$cartid','$cid','$SAname','$ccnum','','2019-04-30')";
	$response6 = mysqli_query($conn,$query6);

	$query7="INSERT INTO APPEARS_IN (CARTID, PID,QUANTITY,PRICESOLD) VALUES ('$cartid','$pid','$quantity_in_cart','$price')";
	$response7 = mysqli_query($conn,$query7);


  	$_SESSION['rgistration_done']=false;
  	if(!$response7)
		echo "wrong query";
	else
	{
		
		$_SESSION['registration_done']=true;
		
	}
	if($_SESSION['registration_done']==true)
	{
		header('location:Cart.php');
	}

	mysqli_close($conn);
	





?>
