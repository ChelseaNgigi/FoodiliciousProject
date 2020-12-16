<html>
<head>
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
    <body>
          
   <a href="Home.php"><div id="logo">
         <h5>Foodilicious</h5>
            </div></a>
   <div id ="navigation">
                
       <h2 style="font-family:courier">SIGN UP</h2>
        </div><br>
       <div class="layout">
        <div id="image">
            <img src="bb.jpg" height="600" width="500">
        </div>
  <?php
        if(isset($_SESSION['message'])){
            echo"<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
        ?>
<div id="forms">
  <form method="post" action="registerpage.php">
     
    
      <label for="fname">First Name</label>
       <input type="text" id="fname" name="firstname" placeholder="Your first name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
      
       <label for="username">Username</label>
        <input type="text" id="username" name="username">
   
      <label for="password1"> Password</label>
      <input type="password" id="password" name="password">
      
       <label for="password2">Repeat Password</label>
      <input type="password" id="password" name="password2">

    <label for="usertype">Usertype</label>
    <select id="usertype" name="usertype">
      <option value="user" name="user">User</option>
      <option value="admin" name="admin">Admin</option>
        <option value="supplier" name="supplier">Supplier</option>
    </select>
  
    <div id="button"><input type="submit" value="Submit" name="submit">
      </div>
     <div id="cancel"><input type="button" value="Cancel" name="cancel">
      </div>
  </form>
        
           
    <p>Already a member?<a href=log_in.php>Log in</a></p>
</div>

        </div>


</body>
</html>
        
        <?php


 $firstname=filter_input(INPUT_POST,'firstname');
$lastname=filter_input(INPUT_POST,'lastname');
$username=filter_input(INPUT_POST,'username');
$password=filter_input(INPUT_POST,'password');
 $password2=filter_input(INPUT_POST,'password');
$usertype=filter_input(INPUT_POST,'usertype');
while($password==$password2){
    $password=md5($password);
}
if(isset($_POST['submit'])){
  session_start();
   

    include("connection.php");
        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'
                .mysqli_connect_error());
        }
        else{
          $sql= "INSERT INTO `accounts`(`UserID`,  `FirstName`, `LastName`,`Username`, `Password`, `Usertype`)
        values('','$firstname','$lastname','$username','$password','$usertype')";
        
        
            if($conn->query($sql)){
                 $sql="SELECT * FROM `accounts` WHERE `Username`='$username'AND `Password`='$password'";  
    $result=mysqli_query($conn,$sql);
   
    if(mysqli_num_rows($result)==1 && $usertype=="admin"){
        $_SESSION ['username'] = $username;
        $_SESSION['userid']=$userid;
        $_SESSION['usertype']=$usertype;
        
               echo'<script>alert("Successful login")</script>';
            echo'<script>window.location="log_in.php"</script>'; 
        header("location:admins.php");
    }
        elseif(mysqli_num_rows($result)==1 && $usertype=="user"){
             $_SESSION ['username'] = $username;
        $_SESSION['userid']=$userid;
        $_SESSION['usertype']=$usertype;
             echo'<script>alert("Successful login")</script>';
            echo'<script>window.location="log_in.php"</script>'; 
        header("location:homepage.php");
            
            }
            else{
                echo"Error: ".$sql."<br>".$conn->error;
            }
               $conn->close(); 
            
        }
    }
}
    
else{
     //echo'<script>alert("Passwords do not match")</script>';
           // echo'<script>window.location="registerpage.php"</script>';
    
die();
}





?>