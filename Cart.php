<?php 
	session_start();

	include("config.php");
Function get_details()
{

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
  	$pid= $_SESSION['pid'];
	$username= $_SESSION['name'];
	#echo $pid;
	#echo $username;
	$query = "SELECT * FROM CUSTOMER Where CUSERNAME='$username'";
	$response = mysqli_query($conn,$query);
	$cid="";
	if($row = $response->fetch_assoc())
	{	
		$cid.=$row["CID"];
		#print_r($row["CID"]);
	}
	else
	{
		echo "bad query";
	}

	$str="<h3>Product Details</h3>";
	$query1 ="SELECT * FROM CART WHERE CID='$cid'";
	$response1=mysqli_query($conn,$query1);
	if($row1 = $response1->fetch_assoc())
	{	
		$str.="<P> Transaction ID: ".$row1['CARTID']."</P>";
		$str.="<P> Transaction Status: ".$row1['TSTATUS']."</P>";
		$_SESSION['ts']=$row1['TSTATUS'];
		$td="".$row1['TDATE'];
		$_SESSION['tdate']=$td;
	}
	else
	{
		echo "bad query1";
	}

	$quantity_in_cart=1;

	$pq=0;
	$ptype="";
	$des="";
	$fp=0;
	$query2="SELECT * FROM PRODUCT WHERE PID='$pid'";
	$response2 = mysqli_query($conn,$query2);
	if($row2 = $response2->fetch_assoc())
	{	
		$str.="<P>Product Name: ".$row2["PNAME"]."</P>";
		$str.="<P>Product Type: ".$row2["PTYPE"]."</P>";
		$ptype.=$row2["PTYPE"];
		$str.="<P>Product Quantity: ".$quantity_in_cart."</P>";
		$pq =$row2["PQUANTITY"];
		$str.="<P>Product Price: ".$row2["PPRICE"]."</P>";
		$q="SELECT * FROM OFFER_PRODUCT WHERE PID='$pid'";
		$r = mysqli_query($conn,$q);
		if($ro = $r->fetch_assoc())
		{	
			$str.="<P>Offer Price: -".$ro["OFFERPRICE"]."</P>";
			$fp=$row2["PPRICE"]-$ro["OFFERPRICE"];
			$str.="<P>Final Price: ".$fp."</P>";
			$_SESSION['psold']=$fp;
		}
		else
		{
			$str.="<P>Offer Price: N/A</P>";
			$fp=$row2["PPRICE"];
			$str.="<P>Final Price: ".$fp."</P>";
			$_SESSION['psold']=$fp;

		}
		$des.=$row2["DESCRPTION"];
		
		#print_r($row4["PQUANTITY"]);
	}
	else
	{
		echo "bad query2";
	}
	if(strcmp($ptype,"COMPUTER")==0)
	{
		$str.="<h5>Additional Product Details:</h5>";
		$query3="SELECT * FROM COMPUTER WHERE PID='$pid'";
		$response3 = mysqli_query($conn,$query3);
		if($row3 = $response3->fetch_assoc())
		{	
			$str.="<P>CPU Type: ".$row3["CPUTYPE"]."</P>";
		}
		else
		{
			echo "bad query3";
		}
	}
	else if(strcmp($ptype,"LAPTOP")==0)
	{
		$str.="<h5>Additional Product Details:</h5>";
		$query4="SELECT * FROM LAPTOP WHERE PID='$pid'";
		$response4 = mysqli_query($conn,$query4);
		if($row4 = $response4->fetch_assoc())
		{	
			$str.="<P>Battery Type: ".$row4["BTYPE"]."</P>";
			$str.="<P>Weight: ".$row4["WEIGHT"]."</P>";
		}
		else
		{
			echo "bad query4";
		}
	}
	else if(strcmp($ptype,"PRINTER")==0)
	{
		$str.="<h5>Additional Product Details:</h5>";
		$query5="SELECT * FROM PRINTER WHERE PID='$pid'";
		$response5 = mysqli_query($conn,$query5);
		if($row5 = $response5->fetch_assoc())
		{	
			$str.="<P>Printer Type: ".$row5["PRINTERTYPE"]."</P>";
			$str.="<P>Printer Resolution: ".$row5["RESOLUTION"]."</P>";
		}
		else
		{
			echo "bad query5";
		}
	}
	else if(strcmp($ptype,"OTHER")==0)
	{
		$str.="<h5>Additional Product Details:</h5>";
		$query6="SELECT * FROM LAPTOP WHERE PID='$pid'";
		$response6 = mysqli_query($conn,$query6);
		if($row6 = $response6->fetch_assoc())
		{	
			$str.="<P>Accessory Type: ".$row6["ACCTYPE"]."</P>";
		}
		else
		{
			echo "bad query6";
		}
	}
	$str.="<P>".$ptype." Description: ".$des."</P>";
	$str.="<h3>Shipping Address Details</h3>";
	$SAname="";
	$query7="SELECT * FROM SHIPPING_ADDRESS WHERE CID='$cid'";
	$response7 = mysqli_query($conn,$query7);
	if($row7 = $response7->fetch_assoc())
	{	
		
		$str.="<P> Recepient Name: ".$row7["RECIPIENTNAME"]."</P>";
		$str.="<P> Shipping Address Name: ".$row7["SANAME"]."</P>";
		$_SESSION['saname']=$row7["SANAME"];
		$str.="<P> Avenue/Street Name: ".$row7["STREET"]."</P>";
		$str.="<P> Street Number: ".$row7["SNUMBER"]."</P>";
		$str.="<P> City Name: ".$row7["CITY"]."</P>";
		$str.="<P> State Name: ".$row7["STATE"]."</P>";
		$str.="<P> ZIP CODE: ".$row7["ZIP"]."</P>";
		$str.="<P> Country Name: ".$row7["COUNTRY"]."</P>";

		#print_r($row2["SANAME"]);
	}
	else
	{
		echo "bad query7";
	}
	return $str;
}
	


?>
<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<title>Cart</title>
	<style>
    .side-by-side
    {
      float:left;
      padding:0px 150px;
    }

  </style>
</head>
<body>
	<!-- Uses a header that scrolls with the text, rather than staying
  locked at the top -->
<div class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Newark IT</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="">about</a>
        <a class="mdl-navigation__link" href="Order.php">Orders</a>
        <a class="mdl-navigation__link" href="Dashboard.php">Dashboard</a>
        <a class="mdl-navigation__link" href="Logout.php">Logout</a>
        
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Newark IT</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">about</a>
      <a class="mdl-navigation__link" href="Profile.php">Profile</a>
      <a class="mdl-navigation__link" href="Logout.php">Logout</a>

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    <!-- Your content goes here -->
    	<center>
    		<h3>Order Details:-</h3>
  				<a class='btn btn-primary btn-lg'  href="Orderpost.php?order=1"> REMOVE FROM CART</a>
  				<a class='btn btn-primary btn-lg'  href="Orderpost.php">PLACE ORDER</a>
  				<a class='btn btn-primary btn-lg'  href="Cart.php">TRACK ORDER</a>
  			</div>
    	</center>
    	
    	<div class="side-by-side">
    		<center>
    			<?php echo get_details(); ?>
    		</center> 
    	</div>
  		<div class="side-by-side"> 
  			<center>
  				<?php echo $_SESSION['Final']; ?> 
  			</center>
  		</div>

    </div>
  </main>
</div>

</body>
</html>