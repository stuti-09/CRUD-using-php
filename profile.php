<?php

session_start();
require('db.php');
$strSQL= "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
$rs= mysqli_query($con, $strSQL);
while($row=mysqli_fetch_array($rs)){
    echo "<h2>Your Profile</h2>"; 
    echo "<div class='profile' >
    name     -   ". $row['name'] . "<br /></div>";
    echo "<div class='profile'>
    username   - ". $row['username'] . "<br /></div>";
    echo  "<div class='profile'>
    email     -   ". $row['email'] . "<br /></div>";
}
mysqli_close($con);
?>