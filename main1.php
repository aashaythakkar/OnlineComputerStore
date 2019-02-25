<?php  
	include("config.php");
?>

<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<link rel="stylesheet" href="shape.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<title>main</title>
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
    <div class="page-content" >
    <!-- Your content goes here -->
		<center>
		<h1>
			Welcome Manager!!
		</h1>
	</center>
	<center>
	
	
	<p align="center">



<p><font size="5"> Select a product to Add</p>
 <p>Product type:
<select name="menu" onchange="gotoPage(this)">
<option value="#">Select an option</option>
<option value="computer.php">computer</option>
<option value="laptop.php">laptop</option>
<option value="printer.php">printer</option>
<option value="others.php">others</option>
</select>
</p>
<input type="button"   onClick="location=document.jump.menu.options[document.jump.menu.selectedIndex].value;" value="GO">

</form>

</p>

<p>
<form action="first.php">
<input type="submit" value="Back">
</form>

</p>


<script type="text/javascript">
function gotoPage(select){
    window.location = select.value;
}
 
</script>
	
	
		
	
	</center>	
    </div>
  </main>
</div>

</body>
</html>