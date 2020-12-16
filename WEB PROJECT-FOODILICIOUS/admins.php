<?php
session_start();
include("connection.php");


?>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
    <body>
          
    <div id="navigation">
    <ul class="navigation">
 <li id ="login"><div id="user"><h4><?php
             echo $_SESSION['username'];?></h4></div></li>
        <li><a href="admins.php">Home</a></li><br>
        <li><a href="insert.php">Fooditems</a></li><br>
        <li><a href="ord.php">Orders</a></li><br>
        <li><a href="admins.php">Supplier</a></li><br>
        <li><a href="ratings.html">Ratings</a></li><br>
        <li id="login"><a href="log-out.php">Logout</a></li>
        
        
        </ul>
    </div>
<div id="customer"> 
   
     <div id="logo">
         <h5>Foodilicious</h5>
         </div>
   
     <h2 style="font-family:courier" >Foodilicious</h2>
      </div>
    <div id="dashboard">
        <h3>Dashboard/<a href ="admins.php">My Dashboard</a></h3>
</div>
        <div class="profile">
           <img src="My-Account-Icon.jpg" height="200px" width="200px">
        <h4 class="welcome">Welcome!!<?php
             echo $_SESSION['username'];?></h4>
        </div>
        <div class="admin">
        <h3>Administrative summary</h3>
            <ul id="large">
<li>Customers:<?php 
    
    include("connection.php");
                $sql="SELECT * FROM `accounts` ";
                $result=mysqli_query($conn,$sql);
                  $num=mysqli_num_rows($result);

echo $num;
?>
            </li>
            <li>Available fooditems: <?php 
    
    include("connection.php");
                $sql="SELECT * FROM `fooditem` ";
                $result=mysqli_query($conn,$sql);
                  $num=mysqli_num_rows($result);

echo $num;
                ?></li>
                 <li>Orders:<?php 
    
    include("connection.php");
                $sql="SELECT * FROM `foodorders` ";
                $result=mysqli_query($conn,$sql);
                  $num=mysqli_num_rows($result);

echo $num;
                ?></li></ul>
 </div>
    </body>
</html>