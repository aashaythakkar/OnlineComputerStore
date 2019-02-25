<?php  
  include("config.php");
  $conn = mysqli_connect("localhost","root","","newark_it");
  session_start();
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $username = $_SESSION['name'];
  $query1 = " SELECT * FROM CUSTOMER WHERE CUSERNAME = '$username' ";
  $query2 = " SELECT S.CCNUMBER,C1.SECNUMBER,C1.OWNERNAME,C1.CCTYPE,C1.ADDRESS,C1.EXPDATE FROM STORED_CARD AS S, CUSTOMER AS C,CREDIT_CARD AS C1 WHERE S.CCNUMBER=C1.CCNUMBER AND C.CID = S.CID AND C.CUSERNAME = '$username' ";
  $query3 = "SELECT * FROM SILVER_AND";
  $result1 = $conn->query($query1);
  $result2 = $conn->query($query2);
  #$result1=mysqli_query($conn,$query1);
  #$result2=mysqli_query($conn,$query2);
  $rowcount1=mysqli_num_rows($result1);
  $rowcount2=mysqli_num_rows($result2);
  $s="<H3>Profile Details</H3><br>";
  if($row1 = $result1->fetch_assoc())
  {
    if($rowcount1 ==0)
    {
      $s.="<P> No Details available </P>";
    }
    else
    {
      $s.=custdetails($rowcount1,$row1);
    }
    
  }
  else
  {
    echo "query 1 wrong";
  }
  $s.="<H3>Stored Card Details</H3></br>";
  if($row2 = $result2->fetch_assoc())
  {
    #echo "inside rows";
    if($rowcount2 ==0)
    {
      $s.="<P> No Details available </P>";
    }
    else
    {
      $s.=stored($rowcount2,$row2);
    }
        
  }
  else
  {
    $s.="<center><P> No Details available: It appears that you dont have a stored card</P>";
    $s.="<a href='Stored1.php'>Add new</a><br><br></center>";

  }

  Function stored($rowcount,$row)
  {
    
    

      $str="<P> CARD OWNER: ".$row['OWNERNAME']."</P>";
      $str.="<P> CARD NUMBER: ".$row['CCNUMBER']."</P>";
      $_SESSION['ccnum']=$row['CCNUMBER'];
      $str.="<P> CVV NUMBER: ".$row['SECNUMBER']."</P>";
      $str.="<P> ADDRESS: ".$row['ADDRESS']."</P>";
      $str.="<P> EXPIRY DATE: ".$row['EXPDATE']."</P>";
      $str.="<P> CARD TYPE: ".$row['CCTYPE']."</P>";     


    return $str;

  }
  Function custdetails($rowcount,$row)
  { 
      $_SESSION['cid']=$row['CID'];
      $str="<P> FIRST NAME: ".$row['FNAME']."</P>";
      $str.="<P> LAST NAME: ".$row['LNAME']."</P>";
      $str.="<P> E-MAIL ADDRESS: ".$row['EMAIL']."</P>";
      $str.="<P> ADDRESS: ".$row['ADDRESS']."</P>";
      $str.="<P> PHONE NO.: ".$row['PHONE']."</P>";
      $str.="<P> YOUR STATUS: ".$row['CSTATUS']."</P>";
      $str.="<P> USERNAME: ".$row['CUSERNAME']."</P>";
      $str.="<P> PASSWORD: ".$row['CPASSWORD']."</P>";

    return $str;
  }

  $_SESSION['Final']=$s;
 ?>


<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<title>Profile Page</title>
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
        <a class="mdl-navigation__link" href="Dashboard.php">Dasboard</a>
        <a class="mdl-navigation__link" href="Cart.php">Cart</a>
        <a class="mdl-navigation__link" href="Logout.php">Logout</a>
        
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Newark IT</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">about</a>
      <a class="mdl-navigation__link" href="Profile1.php">Edit Profile</a>
      <a class="mdl-navigation__link" href="Profile2.php">Edit Stored Card</a>
      <a class="mdl-navigation__link" href="layout.php">Logout</a>
      <a class="mdl-navigation__link" href="">settings</a>

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    <!-- Your content goes here -->
    <center>
      <?php 
        echo $_SESSION['Final'];
      ?>
    </form>
    </center>
    </div>
  </main>
</div>

</body>
</html>