<?php
	$conn = mysqli_connect("localhost","root","","newark_it");
	session_start();
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	 $username=            $_POST['Username'];
	 $password=   		  $_POST['Password'];
   $_SESSION['name'] = $username;
	 #echo "MY USERNAME IS".$username." <br/> AND MY PASSWORD IS ".$password;
	
      $response=mysqli_query($conn, "SELECT * FROM CUSTOMER Where CUSERNAME='$username' AND CPASSWORD='$password' ");

    	$rowcount=mysqli_num_rows($response);
    	$row = $response->fetch_assoc();
    	$cid=$row["CID"];
      #echo $rowcount;
      if ($rowcount==0)
      {
   	  	echo "PLEASE ENTER VALID USERNAME AND PASSWORD.";
  		  die('Error: ' . mysqli_error($conn));
      }
      else
      {       
      	if(strcmp("".$cid,"1")==0)
      	{
      		header('location:first.php');
      	}
      	else if(strcmp("".$cid,"2")==0)
      	{
      		header('location:analyst.php');
      	}
        //echo "<script>alertI('Login Success');</script>";
        else if(strcmp("".$cid,"1000") >0)
        {
        	header('location:Dashboard.php');
        }
        
  		  
      }

	mysqli_close($conn);
?>