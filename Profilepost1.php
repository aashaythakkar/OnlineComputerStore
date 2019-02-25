<?php 
  $conn = mysqli_connect("localhost","root","","newark_it");
  session_start();
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
  $username = $_SESSION['name'];
  $sql="";

    if(!empty($_POST['Fname']))
    {
      $Fname = $_POST['Fname'];
      $sql.="UPDATE CUSTOMER SET FNAME ='$Fname' WHERE CUSERNAME = '$username' ";
   }
    else if(!empty($_POST['Lname']))
    {
      $Lname = $_POST['Lname'];
      $sql.="UPDATE CUSTOMER SET LNAME ='$Lname' WHERE CUSERNAME = '$username' ";
    }
    else if(!empty($_POST['Email']))
    {
      $Email = $_POST['Email'];
      $sql.="UPDATE CUSTOMER SET EMAIL ='$Email' WHERE CUSERNAME = '$username' ";
    }
    else if(!empty($_POST['Address']))
    {
      $Address = $_POST['Address'];
      $sql.="UPDATE CUSTOMER SET ADDRESS ='$Address' WHERE CUSERNAME = '$username' ";
    }
    else if(!empty($_POST['Phone']))
    {
      $Phone = $_POST['Phone'];
      $sql.="UPDATE CUSTOMER SET PHONE ='$Phone' WHERE CUSERNAME = '$username' ";
    }
    else if(!empty($_POST['Password']))
    {
      $Password = $_POST['Password'];
      $sql.="UPDATE CUSTOMER SET CPASSWORD ='$Password' WHERE CUSERNAME = '$username' ";
    }
    else if(!empty($_POST['Password']))
    {
      $Password = $_POST['Password'];
      $sql.="UPDATE CUSTOMER SET CPASSWORD ='$Password' WHERE CUSERNAME = '$username' ";
    }
    $response=mysqli_query($conn,$sql);
    $_SESSION['registration_done'] = false;
  if(!$response)
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