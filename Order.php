<?php  
	include("config.php");
  session_start();

Function get_table()
{
          $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "newark_it";


      $cid=$_SESSION['cid'];
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "SELECT * FROM CART WHERE CID='$cid'";

      $result = $conn->query($sql);
      $rowcount=mysqli_num_rows($result);
      $table_str = "<table width ='100%' class='dl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
                <thead>
                  <tr width='100%'>
                      <th class='mdl-data-table__cell--non-numeric'>ORDER ID</th>
                      <th>CARD NO. USED</th>
                      <th>QUANTITY</th>
                      <th>BUYING PRICE</th>                      
                      <th>TRANSACTION STATUS</th>
                      <th>TRANSACTION DATE</th> 
                  </tr>
                </thead>
                <tbody align='center'>";

      if ($rowcount > 0) {
          // output data of each row
          #echo "inside if";
          while($row = $result->fetch_assoc()) {
            #echo "inside while";
            $table_str.="<tr>";
            #$table_str.="<form method='post' action='Dashpost.php'>";
                $table_str.="<td class='mdl-data-table__cell--non-numeric'>"."\t".$row["CARTID"]."</td>";
                $cartid=$row["CARTID"];
                $table_str.="<td>"."\t".$row["CCNUMBER"]."</td>";

                #getting data from apperas in
                $sql1="SELECT * FROM APPEARS_IN WHERE CARTID='$cartid'";
                $result1 = $conn->query($sql1);
                $rowcount1=mysqli_num_rows($result1);
                if($row1 = $result1->fetch_assoc())
                {
                    $table_str.="<td>"."\t".$row1["QUANTITY"]."</td>";
                    $table_str.="<td>"."\t".$row1["PRICESOLD"]."</td>";
                }


                
                $table_str.="<td>"."\t".$row["TSTATUS"]."</td>";
                $table_str.="<td>"."\t".$row["TDATE"]."</td>";
            #$table_str.="</form>"; 
            $table_str.="</tr>";
          }

          $table_str.="</tbody></table>";

      } 
      else {
          echo "0 results";
      }

      $result->free();
      $conn->close();

      return $table_str;
}

Function search()
{
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "newark_it";

      $s =$_POST["search"];
      $cid=$_SESSION['cid'];
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "SELECT * FROM CART WHERE CID='$cid'AND (TSTATUS LIKE '".$s."%' OR TDATE LIKE '".$s."%' OR CARTID LIKE '".$s."%')";

      $result = $conn->query($sql);
      $rowcount=mysqli_num_rows($result);
      $table_str = "<table width ='100%' class='dl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
                <thead>
                  <tr width='100%'>
                      <th class='mdl-data-table__cell--non-numeric'>ORDER ID</th>
                      <th>CARD NO. USED</th>
                      <th>QUANTITY</th>
                      <th>BUYING PRICE</th>                      
                      <th>TRANSACTION STATUS</th>
                      <th>TRANSACTION DATE</th> 
                  </tr>
                </thead>
                <tbody align='center'>";

      if ($rowcount > 0) {
          // output data of each row
          #echo "inside if";
          while($row = $result->fetch_assoc()) {
            #echo "inside while";
            $table_str.="<tr>";
            #$table_str.="<form method='post' action='Dashpost.php'>";
                $table_str.="<td class='mdl-data-table__cell--non-numeric'>"."\t".$row["CARTID"]."</td>";
                $cartid=$row["CARTID"];
                $table_str.="<td>"."\t".$row["CCNUMBER"]."</td>";

                #getting data from apperas in
                $sql1="SELECT * FROM APPEARS_IN WHERE CARTID='$cartid'";
                $result1 = $conn->query($sql1);
                $rowcount1=mysqli_num_rows($result1);
                if($row1 = $result1->fetch_assoc())
                {
                    $table_str.="<td>"."\t".$row1["QUANTITY"]."</td>";
                    $table_str.="<td>"."\t".$row1["PRICESOLD"]."</td>";
                }


                
                $table_str.="<td>"."\t".$row["TSTATUS"]."</td>";
                $table_str.="<td>"."\t".$row["TDATE"]."</td>";
            #$table_str.="</form>"; 
            $table_str.="</tr>";
          }

          $table_str.="</tbody></table>";

      } 
      else {
          echo "0 results";
      }

      $result->free();
      $conn->close();

      return $table_str;

}
      Function display()
      {
        if(empty($_POST["search"]) ){
  
          echo get_table();
        }
        else
        {

          echo search();
        }

      }
?>

<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<title>Transaction History</title>
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
        <a class="mdl-navigation__link" href="Dashboard.php">Dashboard</a>
        <a class="mdl-navigation__link" href="Cart.php">Cart</a>
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
    <h3>Your Orders</h3>
    <!-- Textfield with Floating Label -->
    <br>
    <form  method="post" action="#">
        <center >
          <p>Search Transaction Status or Transaction Date or Order ID</p>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name ="search" class="mdl-textfield__input" type="text" id="sample3">
            <label class="mdl-textfield__label" for="sample3">Search Here ...</label>
          </div>
          <div>
            <!-- Colored raised button -->
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
              Search
          </button>
          </div>
        </center>
    </form>
    <br>
    <?php echo display(); ?>
    </div>
  </main>
</div>

</body>
</html>