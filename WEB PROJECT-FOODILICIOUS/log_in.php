<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="log.css">
    </head>
    <body>
        <a href="Home.php"><div id="logo">
         <h5>Foodilicious</h5>
            </div></a>
   
        <div id="navigation">
         <h2 style="font-family:courier">LOG IN</h2>
        </div>
        <div id="allforms">
     <?php
        if(isset($_SESSION['message'])){
            echo"<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
        ?>
            
            <form method="post" action="log_in.php">
  <div class="container">
      
    <h1>Login</h1>
    
    <hr>
      <label for="userid"><b>UserID</b></label>
    <input type="text" placeholder="Enter userID" name="userid" required>

       <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>
      
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <input type="hidden"  name="usertype" >
  
    <button type="submit" class="registerbtn" name=login>Log In</button>
     
   <br> <p>Not a member? <a href="registerpage.php">Sign in</a>.</p>  
  </div>
 </form>

   

        </div>
    </body>
    </html>
<?php 
session_start();

if(isset($_POST['login'])){
    
   include("connection.php");
    $username=filter_input(INPUT_POST,'username');
    $userid=filter_input(INPUT_POST,'userid');
    $password=filter_input(INPUT_POST,'password');
    $password=md5($password);
    $sql="SELECT * FROM `accounts` WHERE `UserID`='$userid'AND `Password`='$password'";  
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
            
                  
    $usertype=$row["Usertype"];
                
   // $usertype=$_SESSION['usertype'];
    if(mysqli_num_rows($result)==1 && $usertype=="admin"){
       //echo'<script>alert("Successful login")</script>';
            //echo'<script>window.location="log_in.php"</script>';
        $_SESSION ['username'] = $username;
        $_SESSION ['userid'] = $userid;
        
        header("location:admins.php"); 
    }
   elseif(mysqli_num_rows($result)==1 && $usertype=="user"){
       $_SESSION ['username'] = $username;
        $_SESSION ['userid'] = $userid;
        
        header("location:homepage.php"); 
       
   }
    else{
        echo $usertype;
       echo'<script>alert("Invalid username/password.Please try again")</script>';
         echo'<script>window.location="log_in.php"</script>';
    }
}


?>