<?php
//session_start();
require('db.php');

if(isset($_POST['update'])){
    
     $usernewname = $_POST['updatename'];
     $newusername = $_POST['updateusername'];
     $usernewemail= $_POST['useremail'];

     if(!empty($newusername) && !empty($usernewemail)){
         $loggedInUser = $_SESSION['username'];
         $sql = "UPDATE users SET name='$usernewname' , username='$newusername' , email='$usernewemail' WHERE username= '$loggedInUser' ";
         $results = mysqli_query($con, $sql);
         $_SESSION['message']="Profile updated";
         
         header('location:dashboard.php');
         exit;

     }
     else{
         header('location:userprofile.php?error=emptyusernameandemail');
         exit;
     }
}

?>