<html>
    
<head>
    <title>Update</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
    <body>
          


        <div id="table">
        <table class="table">
        <tr>
            
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>FoodImage</th>
            
          
            
            </tr>
        <?php
                include("connection.php");
                $sql="SELECT * FROM `fooditem` ORDER BY `ID` DESC";
                $result=mysqli_query($conn,$sql);
              
         while($row=mysqli_fetch_array($result)) 
                  {
echo "<tr><form action=update.php method=post>";
echo "<td><input type=text name=id value='".$row['Name']. "'></td>";
echo "<td><input type=text name=fooditem value='" . $row['nm'] . "'></td>";
echo "<td><input type=text name=description value='" . $_GET['ds']. "'></td>";
echo "<td><input type=text name=price value='" . $_GET['pc'] . "'></td>";
  echo "<td><input type=text name=name value='" . $_GET['img']. "'></td>";          
echo "<td><input type=submit name=submit value=Submit></td>"; 
                   
                   
 echo"</form>";                                 
echo "</tr>";
         }
echo "</table>";
                    
            ?>                                   
        </table>
      
</div>

</body>
</html>

<?php
 $fooditem=filter_input(INPUT_POST,'fooditem');
$description=filter_input(INPUT_POST,'description');
    $price=filter_input(INPUT_POST,'price');
$name=filter_input(INPUT_POST,'name');
    $id=filter_input(INPUT_POST,'id');
include("connection.php");
     $sql="UPDATE `fooditem` SET `Name`='$fooditem',`Description`='$description',`Price`='$price',`ImageName`='$name' WHERE `id`='$id";
if(mysqli_query($conn,$sql))
{
   // header("refresh:1;url=insert.php");
}
else 
{
    echo"ERROR.Row not updated";
}
                  ?>
