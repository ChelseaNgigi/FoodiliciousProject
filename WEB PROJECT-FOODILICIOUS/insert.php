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
                        <li><a href="admins.html">Supplier</a></li><br>
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
                <h3>Fooditems(View/Add/Delete)</h3>
            </div>
    


            <div id="forms">
                <form method="post" action="insert.php" enctype="multipart/form-data">
                        <label for="fooditem">Food item</label>
                            <input type="text" id="fooditem" name="fooditem">
                                <label for="description">Description</label>
                                    <input type="text" id="description" name="description">
                                        <label for="image">Upload Image</label><br>
                                            <input type="file" name="image"><br><br>
                                                 <label for="price">Price</label>
                                                     <input type="text" id="price" name="price">
                                                        <div id="button"><input type="submit" name="submit" value="SAVE"></div>
                                                            <div id="cancel"><input type="button" value="Cancel">
                                                                </div>
      
  </form>
</div>
<br>
 <br>
        <div id="table">
        <table class="table">
        <tr>
            
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>FoodImage</th>
            <th>Update</th>
            <th>Delete</th>
          
            
            </tr>
        <?php
                include("connection.php");
                $sql="SELECT * FROM `fooditem` ORDER BY `ID` DESC";
                $result=mysqli_query($conn,$sql);
               while($row=mysqli_fetch_array($result)) 
                  {
                
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
  echo "<td>" . $row['ImageName'] . "</td>";          
echo"<td><a href=update.php?id=".$row['id']."&nm=".$row['Name']."&ds=".$row['Description']."&pc=".$row['Price']."&img=". $row['ImageName'].">Edit</a</td>";
 echo"<td><a href=delete.php?id=".$row['id'].">Delete</a</td>";
                                  
echo "</tr>";
}
echo "</table>";
                    
            ?>                                   
        </table>
      
</div>

</body>
</html>

<?php
if(isset($_POST['submit'])){
    
   // if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
       // echo"Failed";
        
   // }
    //else{
        $name=addslashes($_FILES['image']['name']);
        $image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
        saveImage($name,$image);
        
   // }
}
function saveImage($name,$image){
    $fooditem=filter_input(INPUT_POST,'fooditem');
$description=filter_input(INPUT_POST,'description');
    $price=filter_input(INPUT_POST,'price');
    include("connection.php");
    $sql="INSERT INTO `fooditem`(`id`,`Name`,`Description`,`Price` ,`ImageName`, `Image`) VALUES ('','$fooditem','$description','$price','$name','$image')";
    $query=mysqli_query($conn,$sql);
    if($query){
        
          
        echo'<script>alert("Uploaded successfully")</script>';
          echo'<script>window.location="insert.php"</script>';
        header("refresh:1;url=insert.php");
    }
    else{
        echo"Upload not successful";
    }
}
  $query=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($query);
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploaded/'.$row["ImageName"];
    
?>

    <img class="img" src="<?php
        echo $imageURL;?>" alt="" />
<?php 
}
}else{ ?>
    <p>No image(s) found...</p>
<?php } 

?>
