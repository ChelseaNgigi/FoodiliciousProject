<?php
 include("connection.php");
                $sql="DELETE FROM `orderdetails` WHERE `id`='$_GET[id]'";
if(mysqli_query($conn,$sql))
{ 
    echo'<script>alert("Deleted record")</script>';
      echo'<script>window.location="orderdetails.php"</script>';
    header("refresh:1;url=orderdetails.php");
}
else
 {   
    echo"ERROR.Row not deleted";
}
 ?>