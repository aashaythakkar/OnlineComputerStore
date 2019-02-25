<?php  
	session_start();

	include("config.php");
?>
<?php  
    		Function get_table()
    		{
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
			$sql = "SELECT * FROM PRODUCT";
			$result = $conn->query($sql);
			$rowcount=mysqli_num_rows($result);
			$table_str = "<table width ='100%' class='dl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
  							<thead>
    							<tr width='100%'>
      								<th class='mdl-data-table__cell--non-numeric'>PRODUCT ID</th>
      								<th>PRODUCT TYPE</th>
      								<th>PRODUCT NAME</th>
      								<th>PRODUCT PRICE</th>
      								<th>PRODUCT DESCRIPTION</th>
      								<th>PRODUCT AVAILABLE QUANTITY</th>
                      <th>ADD TO CART</th>
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
        				$table_str.="<td name='pid' class='mdl-data-table__cell--non-numeric'>". $row["PID"]."</td>";
        				$table_str.="<td>"."\t".$row["PTYPE"]."</td>";
        				$table_str.="<td>"."\t".$row["PNAME"]."</td>";
        				$table_str.="<td>"."\t".$row["PPRICE"]."</td>";
        				$table_str.="<td>"."\t".$row["DESCRPTION"]."</td>";
        				$table_str.="<td>"."\t".$row["PQUANTITY"]."</td>";
                $table_str.="<td>"."\t"."<a class='btn btn-primary btn-lg'  href='Dashpost.php?pid=".$row['PID']."'>ADD</a> </td>";
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

			Function get_search()
    		{
    			$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "newark_it";
				$s =$_POST["search"];

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
    				die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "SELECT * FROM PRODUCT WHERE PNAME LIKE '".$s."%'  OR PTYPE LIKE  '".$s."%' ";
				$response=mysqli_query($conn,$sql);
				$rowcount=mysqli_num_rows($response);
				$table_str = "<table width ='100%' class='dl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
  								<thead>
    							<tr width='100%'>
      								<th class='mdl-data-table__cell--non-numeric'>PRODUCT ID</th>
      								<th>PRODUCT TYPE</th>
      								<th>PRODUCT NAME</th>
      								<th>PRODUCT PRICE</th>
      								<th>PRODUCT DESCRIPTION</th>
      								<th>PRODUCT AVAILABLE QUANTITY</th>
                      <th>ADD TO CART</th>
    							</tr>
  								</thead>
  							<tbody align='center'>";

				if ($rowcount > 0) {
    			// output data of each row
    			#echo "inside if";
              $i=1;
    					while($row = $response->fetch_assoc()) {
    						$table_str.="<tr>";
                #$table_str.="<form method='post' action='Dashpost.php'>";
        						$table_str.="<td name='pid'class='mdl-data-table__cell--non-numeric'>". $row["PID"]."</td>";
        						$table_str.="<td>"."\t".$row["PTYPE"]."</td>";
        						$table_str.="<td>"."\t".$row["PNAME"]."</td>";
        						$table_str.="<td>"."\t".$row["PPRICE"]."</td>";
        						$table_str.="<td>"."\t".$row["DESCRPTION"]."</td>";
        						$table_str.="<td>"."\t".$row["PQUANTITY"]."</td>";
                    $table_str.="<td>"."\t"."<a class='btn btn-primary btn-lg'  href='Dashpost.php?pid=".$row['PID']."'>ADD</a> </td>";
                #$table_str.="</form>";   
        					$table_str.="</tr>";
                  $i++;
    					}
    					$table_str.="</tbody></table>";
    				}
    				else {
    					echo "0 results";
					}

					$conn->close();
					return $table_str;
			}
			Function display()
		{
			if(empty($_POST["search"]) ){
				echo "<h3>Products</h3>";
				echo get_table();
			}
			else
			{
				echo "<h3>Searched Products</h3>";
				echo get_search();
			}
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
        <a class="mdl-navigation__link" href="Order.php">Orders</a>
        <a class="mdl-navigation__link" href="Cart.php">Cart</a>
        <a class="mdl-navigation__link" href="Layout.php">Logout</a>

        
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
    <style type="css">
		p { 
   			font-size: 24px !important; 
		}

		</style>
    	
		<h3>welcome <?php echo $_SESSION['name']; ?></h3>
		<!-- Textfield with Floating Label -->
		<br>
		<form  method="post" action="#">
  			<center >
  				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    				<input name ="search" class="mdl-textfield__input" type="text" id="sample3">
    				<label class="mdl-textfield__label" for="sample3">Search Product Name or Product Type ...</label>
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
		<?php echo display() ?>
	 	

		
  
    </div>
   </main>
  </div>


</body>
</html>