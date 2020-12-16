 <?php
 include("connection.php");
                $sql="DELETE FROM `foodorders` WHERE `id`='$_GET[id]'";
if(mysqli_query($conn,$sql))
{ 
    echo'<script>alert("Deleted record")</script>';
      echo'<script>window.location="ord.php"</script>';
    header("refresh:1;url=ord.php");
}
else
 {   
    echo"ERROR.Row not deleted";
}
 ?>