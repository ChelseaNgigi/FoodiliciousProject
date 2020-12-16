<?php
session_start();
include("connection.php");
if(isset($_POST["addtocart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $fooditemid=array_column($_SESSION["shopping_cart"],"fooditem_id");
        if(!in_array($_GET["id"],$fooditemid))
        {
            $count=count($_SESSION["shopping_cart"]);
            $fooditems=array(
                'fooditem_id'=> $_GET["id"],
                'fooditem_name'=>$_POST["hidden_name"],
               'fooditem_description'=>$_POST["hidden_description"],
                'fooditem_price'=>$_POST["hidden_price"],
                'fooditem_quantity'=>$_POST["quantity"]
            
            );
            $_SESSION["shopping_cart"][$count]=$fooditems;
        }
        else{
            echo'<script>alert("Item Already Added")</script>';
            echo'<script>window.location="orders.php"</script>';
        }
    }
    else{
        $fooditems=array(
                'fooditem_id'=> $_GET["id"],
                'fooditem_name'=>$_POST["hidden_name"],
               'fooditem_description'=>$_POST["hidden_description"],
            'fooditem_price'=>$_POST["hidden_price"],
                'fooditem_quantity'=>$_POST["quantity"]
            
            );
         $_SESSION["shopping_cart"][0]=$fooditems;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"]=='delete')
    {
        foreach($_SESSION[shopping_cart]as $keys =>$values)
        {
            if($values["fooditem_id"]==$_GET["id"])
            {
            unset($_SESSION["shopping_cart"][$keys]);
            echo'<script>alert("Item Removed)</script>';
            echo '<script>window.location="orders.php"</script>';         }   
        }
    }
}
?>
<html>

<head>
    <title>Pizza Orders</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    
   
    </head>


<body>
       <a href="Homepage.php"><div id="logo">
         <h5>Foodilicious</h5>
            </div></a>
   
    <div id="navigation">
    <ul class="navigation">

        <li><a href="homepage.php">Home</a></li>
        <li><a href="orders.html">Order</a></li>
        <li><a href="Pricing.html">Pricing and plan</a></li>
        <li><a href="aboutus.php">About Us</a></li>
       
        <li id="login"><a href="log-out.php">Logout</a></li>
         <li id ="login"><div id="user"><h4><?php
             echo $_SESSION['username'];?></h4></div></li>
        
        </ul>
    </div>
  <div id="allforms">
    <div class="containers">
    <h3 align="center">Shopping cart</h3><br>
        <?php
        $sql="SELECT * FROM `fooditem` ORDER BY `id` ASC";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result))
            {
                 $imageURL = 'uploaded/'.$row["ImageName"];
                ?>
                <div class="shopping">
                    <form method="post" action="orders.php?action=add&id=<?php echo $row["id"];?>">
                        <div class="cart">
                        
                                <img class="img" src="<?php
                                    echo $imageURL;?>" alt="" />

                            <h4 class="text_info"><?php echo $row["Name"];?></h4>
                            <h4 class="text_description"><?php echo $row["Description"];?></h4>
                            <h4 class="text-danger">$ <?php echo $row["Price"];?></h4>
                            <input type="text" name="quantity" class="quantity" value="1">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["Name"];?>">
                            <input type="hidden" name="hidden_description" value="<?php echo $row["Description"];?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["Price"];?>">
                            <div class="btn"></div><input type="submit" name="addtocart" class="btn" value="Add to Cart">
                        </div>
                            </form>
                     </div>
        
        
        <?php
            }
        }
        
        
        ?>
        
        <div style="clear:both"></div></div>
        <br>
      </div><br><br>
        <h3>My Cart</h3>
        <div class="ordertable">
        <table class="tableclass">
            <tr>
            <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Delete</th>
             </tr>
            <?php
            if(!empty($_SESSION["shopping_cart"]))
            {
             $amount=0;
                foreach($_SESSION["shopping_cart"] as $keys=>$values)
                {
                    
                 ?>
            <tr>
                
                <td><?php echo $values["fooditem_name"];?></td>
                 <td><?php echo $values["fooditem_quantity"];?></td>
                <td>$<?php echo $values["fooditem_price"];?></td>
                <td><?php echo number_format($values["fooditem_quantity"]*$values["fooditem_price"],2);?></td>
            
            <td><a href="orders.php?action=delete&id=<?php echo $values["fooditem_id"];?>"><span class="text-danger">Remove</span></a></td>
            </tr>
            <?php
                    $amount+=($values["fooditem_quantity"]*$values["fooditem_price"]);
                }
            
                ?>
            <tr>
            <td colspan="3" align="right">Total Amount</td>
                <td align="left">$ <?php echo number_format($amount,2);?></td>
                <td></td>
   </tr>
            
        
                <?php        
 }
  ?>       
            </table>
        
        </div>
    <form method="post" action="orders.php">
        <div class="order">
            <input type="submit"  id="order" name="makeOrder" value="Make order">
        </div>
    </form>
    
    </body>
</html>
<?php
if(isset($_POST['makeOrder']))
{
    
   $userid= $_SESSION ['userid'];
    //$amount=($values["fooditem_quantity"]*$values["fooditem_price"]);
    $status="Pending";
   
    $sql="INSERT INTO `foodorders`(`id`, `user_id`, `date_created`, `amount`, `status`) VALUES ('','$userid',NOW(),'$amount','$status')";
    $query=mysqli_query($conn,$sql);
    if($query){
        
          
        echo'<script>alert("Order made successfully")</script>';
          echo'<script>window.location="orders.php"</script>';
        
    }
    else{
        echo"Order not made";
    }

if($conn->query($sql)){
                 $sql="SELECT * FROM `foodorders` WHERE `user_id`='$userid' AND";  
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result); 
     
      
}
echo $id;
$price=$values["fooditem_price"];
$des=$values["fooditem_description"];
   $quantity= $values["fooditem_quantity"];
    $count=$values["fooditem_id"];
    for($i=0;$i<$count;$i++){
      $sql="INSERT INTO `orderdetails`(`id`, `Order_id`, `Unit_amount`, `Description`, `Quantity`) VALUES ('','$id','$price','$des','$quantity')";   
    }
   
    $query=mysqli_query($conn,$sql);
}
  ?>  