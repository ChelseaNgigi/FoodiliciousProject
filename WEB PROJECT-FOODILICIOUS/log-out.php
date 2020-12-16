<?php
session_start();
session_destroy();
unset($_SESSION['username']);
echo'<script>alert("You have been logged out")</script>';
echo'<script>window.location="log_out.php"</script>';
header("location:log_in.php");
?>