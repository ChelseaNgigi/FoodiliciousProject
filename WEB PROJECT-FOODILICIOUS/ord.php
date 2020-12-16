<?php
session_start();
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
                        <li><a href="admins.php">Supplier</a></li><br>
                        <li><a href="ord.php">Orders</a></li><br>
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
                <h3>Orders(View/Delete)</h3>
            </div>
     <br><br><br>
<div id="table">
        <table class="table">
        <tr>
            
            <th>ID</th>
            <th>UserID</th>
            <th>Date created</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Details</th>
            <th>Update</th>
            <th>Delete</th>
          
            
            </tr>
        <?php
                include("connection.php");
                $sql="SELECT * FROM `foodorders` ORDER BY `ID` DESC";
                $result=mysqli_query($conn,$sql);
               while($row=mysqli_fetch_array($result)) 
                  {
                
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['user_id'] . "</td>";
echo "<td>" . $row['date_created'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
  echo "<td>" . $row['status'] . "</td>";
echo"<td><a href=orderdetails.php>Details</a></td>";
echo"<td><a href=update.php?id=".$row['id']."&nm=".$row['user_id']."&ds=".$row['date_created']."&pc=".$row['amount']."&img=". $row['status'].">Edit</a</td>";
 echo"<td><a href=del.php?id=".$row['id'].">Delete</a></td>";
                                  
echo "</tr>";
}
echo "</table>";
                    
            ?>                                   
        </table>
      
</div>
    </body>
</html>