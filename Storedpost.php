<?php 
  $conn = mysqli_connect("localhost","root","","newark_it");
  session_start();
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 

  $username = $_SESSION['name'];
  $day = $_POST['expday'];
  $month = $_POST['expmonth'];
  $year = $_POST['expyear'];
  $newccnum = $_POST['ccnumber'];
  $newcowner = $_POST['cowner'];
  $newcvv = $_POST['cvv'];
  $newexpdate = $year."-".$month."-".$day;
  $newadd = $_POST['Address'];


  $newcctype = $_POST['ctype'] ;

  #selecting cid of current customer
  $query1="SELECT CID FROM CUSTOMER WHERE CUSERNAME='$username' ";
  $response1=mysqli_query($conn,$query1);
  $row1 = $response1->fetch_assoc();
    $cid = $row1["CID"];
  #insert into stored card
  $query2="INSERT INTO STORED_CARD (CCNUMBER, CID) VALUES ('$newccnum','$cid') ";
  $response2 = mysqli_query($conn,$query2);
  #insert into credit card
  $query3="INSERT INTO CREDIT_CARD  (CCNUMBER, SECNUMBER, OWNERNAME, CCTYPE, ADDRESS, EXPDATE) VALUES ('$newccnum','$newcvv','$newcowner','$newcctype','$newadd','$newexpdate') ";
  $response3 = mysqli_query($conn,$query3);
  #inserting new values in credit card
  #$query4 = "INSERT INTO CREDIT_CARD (CCNUMBER, SECNUMBER, OWNERNAME, CCTYPE, ADDRESS, EXPDATE) values('$newccnum', '$newcvv', '$newcowner', '$newcctype','$newadd', '$newexpdate')";
  #$response4 = mysqli_query($conn,$query4);
  #insert into stored card
  #$query5="INSERT into STORED_CARD (CCNUMBER, CID) values('$newccnum', '$ocid')";
  #$response5 = mysqli_query($conn,$query5);

  $_SESSION['registration_done'] = false;
  if(!$response3)
    echo "wrong query";
  else
  {
    
    $_SESSION['registration_done']=true;
    
  }
  if($_SESSION['registration_done']==true)
  {
    header('location:Profile.php');
  }


 ?>