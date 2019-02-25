<?php  
	include("config.php");
?>

<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<title>Analyst</title>
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
      <h1>
        Data Analyst
      </h1>
      
        <form method="post" action="frequentlywithindate.php">
         Most Frequently Sold Products Within dates: <input type="date" name="start" >
        and: <input type="date" name="till">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Go
        </button>
      </form>
      <br>
      <br>
           <form method="post" action="frequentlydistinct.php">
         Most Products Sold to Distinct Customers Within dates: <input type="date" name="start" >
        and: <input type="date" name="till">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Go
        </button>
      </form>  
                     
      <br>
      <br>
    
          
          <form method="post" action="10bestcustomers.php">
         10 Best Customers in Descending Order: <input type="date" name="start" >
        and: <input type="date" name="till">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Go
        </button>
      </form>  
      <br>
      <br>
    
        <form method="post" action="5zipcodes.php">
         5 Best Zip Codes: <input type="date" name="start" >
        and: <input type="date" name="till">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Go
        </button>
      </form>  
      <br>
      <br>
          
          <form method="post" action="averagecomputer.php">
         Average Selling Product Price - Computers: <input type="date" name="start" >
        and: <input type="date" name="till">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Go
        </button>
      </form>
      
      <br>
      <br>
  
          <form method="post" action="averagelaptop.php">
         Average Selling Product Price - Laptops: <input type="date" name="start" >
        and: <input type="date" name="till">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Go
        </button>
      </form>
      <br>
      <br>
           <form method="post" action="averageprinter.php">
         Average Selling Product Price - Printers: <input type="date" name="start" >
        and: <input type="date" name="till">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Go
        </button>
      </form>
      
    </center>
    </div>
  </main>
</div>

</body>
</html>