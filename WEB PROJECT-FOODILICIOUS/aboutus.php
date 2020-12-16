<?php
session_start();

?>
<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="Homepage.css">
    
    
</head>
    
<body>
    <div id="logo">
         <h5>Foodilicious</h5>
         </div>
   
    <div id="navigation">
    <ul class="navigation">

        <li><a href="Homepage.php">Home</a></li>
        <li><a href="orders.php">Order</a></li>
        <li><a href="Pricing.html">Pricing and plan</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        
        
         <li id="login"><a href="log-out.php">Logout</a></li>
         <li id ="login"><div id="user"><h4><?php
             echo $_SESSION['username'];?></h4></div></li>
        
        
        </ul>
    </div>
        `   <h1 style="font-family:courier">Foodilicious</h1>
	<div id="allforms">	
    <h2 style="text-align:centre;">About Us</h2>
		
		<h3>Enjoy our tasty delicacies now.</h3>

			<p>Foodilicious was founded in the year 2019,with an aims to provide a mouth watering experience for all its customers world wide.Foodilicious provides ordering and delivery services for a variety of foods ranging from appetizers,the main meals,desserts and even snacks.</p>
			<p>We have partnered with numerous of your favourite restaurants to make ensure our customers get what they need.</p>
			<p>Come one ,come all and lets enjoy the sweet things in life together</p><br>
		<a href="homepage.php">Contact Us</a>
    </div>
	
	</body>
</html>