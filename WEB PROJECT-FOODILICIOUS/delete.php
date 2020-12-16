 <?php
 include("connection.php");
                $sql="DELETE FROM `fooditem` WHERE `id`='$_GET[id]'";
if(mysqli_query($conn,$sql))
{ 
    echo'<script>alert("Deleted record")</script>';
      echo'<script>window.location="insert.php"</script>';
    header("refresh:1;url=insert.php");
}
else
 {   
    echo"ERROR.Row not deleted";
}
 ?>