<?php  
  include("config.php");
  session_start();

 
  
  
  Function display()
  {
     $conn = mysqli_connect("localhost","root","","newark_it");
      
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $start=   $_POST['start'];
   $till=     $_POST['till'];
   //$_SESSION['name'] = $username;
   echo "Start date is ".$start." <br/> till ".$till;
  
    
      $response=mysqli_query($conn, "SELECT MAX(X),PID FROM (SELECT PID,COUNT(DISTINCT CID) AS X FROM (SELECT PID,CID,cart.cartid FROM cart JOIN appears_in ON cart.cartid=appears_in.cartid )as w GROUP BY PID) AS Z");
     
      $rowcount=mysqli_num_rows($response);
      #echo $rowcount;
      $str="";
      if ($rowcount==0)
      {
        echo "PLEASE ENTER VALID DATES.";
        die('Error: ' . mysqli_error($conn));
      }
      else
      {        
        
        $str.= "<table>";
        while($row = mysqli_fetch_array($response)){   //Creates a loop to loop through results
        //echo "<tr><td>" . $row['CARTID'] . "</td><td>" . $row['CID'] . "</td></tr>". $row['SANAME'] . "</td></tr>". $row['CCNUMBER'] . "</td></tr>". $row['TSTATUS'] . "</td></tr>". $row['TDATE'] . "</td></tr>";  //$row['index'] the index here is a field name
        $str.= "<tr><td><h3>"."Number of Distinct Customers: ". $row['MAX(X)']."</h3></td></tr><tr><td><h3>"."Most Frequently Sold To Distinct Customers Product ID: ".$row['PID']."</h3></td></tr>";
      }
        $str.= "</table>";
      }
      return $str;
    }


?>

<html>
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <title>Basic page</title>
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
        <a class="mdl-navigation__link" href="logout.php">Logout</a>
        <a class="mdl-navigation__link" href="">settings</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Newark IT</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">about</a>
        <a class="mdl-navigation__link" href="logout.php">Logout</a>
        <a class="mdl-navigation__link" href="">settings</a>


    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    <!-- Your content goes here -->
    <center>
      <h3>
    <?php

     echo display(); ?>
     <a class="mdl-navigation__link" href="analyst.php">Go Back</a>
    </h3>
    </center>
    </div>
  </main>
</div>

</body>
</html>