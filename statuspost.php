<?php  
	session_start();

	include("config.php");
?>
<?php  


    		Function get_table()
    		{
          $cartid = 0;
           $cartid =$_POST['cartid'];
    			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "newark_it";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql=( "SELECT * FROM CART WHERE CARTID='$cartid' ");
			$result = $conn->query($sql);
			$rowcount=mysqli_num_rows($result);
			$table_str = "<table width ='100%' class='dl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
  							<thead>
    							<tr width='100%'>
      								<th class='mdl-data-table__cell--non-numeric'>CARTID</th>
      								<th>CID</th>
      								<th>SANAME</th>
      								<th>CCNUMBER</th>
      								<th>TSTATUS</th>
      								<th>DATE</th>
    							</tr>
  							</thead>
  							<tbody align='center'>";

			if ($rowcount > 0) {
    			// output data of each row
    			#echo "inside if";
    			while($row = $result->fetch_assoc()) {
    				#echo "inside while";
					$date = "2018-2-14";
					
    				$table_str.="<tr>";
        			$table_str.="<td class='mdl-data-table__cell--non-numeric'>"."\t".$row["CARTID"]."</td>";
        				$table_str.="<td>"."\t".$row["CID"]."</td>";
        				$table_str.="<td>"."\t".$row["SANAME"]."</td>";
        				$table_str.="<td>"."\t".$row["CCNUMBER"]."</td>";
						
			
					    $table_str.="<td>"."\t".$row["TSTATUS"]."</td>";
						
						
        				$table_str.="<td>"."\t".$date."</td>";
						
						
        			$table_str.="</tr>";
    			}

    			$table_str.="</tbody></table>";

			} 
			else {
    			echo "0 results";
			}
        $_SESSION['CART']=$cartid;
			$conn->close();
			return $table_str;
    		}

			
		
?>

<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<title>Dashboard</title>
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
    <style type="css">
		p { 
   			font-size: 24px !important; 
		}

		</style>
    	
		
		<br>
		<?php echo get_table() ?>
		<br><br>
		</div>
		<div>
		<center>
		<form method= "post" action="cart1.php">
			ENTER THE CART ID: <input type="number" name="CARTID" value="<?php print_r($_SESSION['CART']) ?>" ><br>
		<form method= "post" action="cart1.php">	
			<select name="TSTATUS">
  <option value="shipped">shipped</option>
  <option value="not shipped">not shipped</option>
  <option value="proccessing">processing</option>
</select>
<br>
<br>
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  					Submit
			</button>
		</form>
		
		
		<p>
<form action="status.php">
<input type="submit" value="back">
</form>

</p>

	</div>
	</center>	
	</div>
   </main>
  </div>
<

</body>
</html>