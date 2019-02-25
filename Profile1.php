<?php  
  include("config.php");
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
      <a class="mdl-navigation__link" href="layout.php">Logout</a>
      <a class="mdl-navigation__link" href="">settings</a>

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    <!-- Your content goes here -->
    <center>
    	<h3>Make sure edit only one item at a time</h3>
    	<form method= "post" action="Profilepost1.php">
    		Firstname: <input type="text" name="Fname" ><br>
			Lastname: <input type="text" name="Lname"><br>
			Email: <input type="text" name="Email"><br>
			Address: <textarea name="Address" rows ="4" cols = "50"></textarea><br>
			Phone no: <input type="number" name="Phone"><br>
			Password: <input type="text" name="Password"><br>
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
          Edit Profile
        </button>
    	</form>
    </center>
    </div>
  </main>
</div>

</body>
</html>      
      