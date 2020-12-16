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
                <h3>Ordersdetails(View/Delete/Update)</h3>
            </div>
        <br><br><br><br>
<div id="table">
        <table class="table">
        <tr>
            
            <th>ID</th>
            <th>OrderID</th>
            <th>Unit Amount</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Update</th>
            <th>Delete</th>
          
            
            </tr>
        <?php
                include("connection.php");
                $sql="SELECT * FROM `orderdetails` ORDER BY `ID` DESC";
                $result=mysqli_query($conn,$sql);
               while($row=mysqli_fetch_array($result)) 
                  {
                
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['Order_id'] . "</td>";
echo "<td>" . $row['Unit_amount'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
  echo "<td>" . $row['Quantity'] . "</td>";          
echo"<td><a href=update.php?id=".$row['id']."&nm=".$row['Order_id']."&ds=".$row['Unit_amount']."&pc=".$row['Description']."&img=". $row['Quantity'].">Edit</a</td>";
 echo"<td><a href=deletee.php?id=".$row['id'].">Delete</a</td>";
                                  
echo "</tr>";
}
echo "</table>";
                    
            ?>                                   
        </table>
      
</div>

</body>
</html>