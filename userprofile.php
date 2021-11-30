<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>User Profile</title>
</head>
<body>
<?php
session_start();
require('db.php');
include('edit_profile.php');


?>
   <h2>User Profile</h2>
   <?php 
  if(isset($_GET['success'])){
       
        ?>
        <small class="alert alert-success">User updated successfully</small>
        <?php
       
   }
   ?>
   <?php
   if(isset($_GET['error'])){
       ?>
       <small class="alert alert-danger">Username and email is required</small>
       <?php
   }
   ?>
   
       
       <?php
       $currentUsername = $_SESSION['username'];
       $sql = "SELECT * FROM users WHERE username = '$currentUsername' ";
       $gotResults = mysqli_query($con,$sql);
       if($gotResults){
           if(mysqli_num_rows($gotResults)>0){
               while($row=mysqli_fetch_array($gotResults)){
                   ?>
    <form action="userprofile.php" method="post">
                    <div><input type="text" name="updatename" value="<?php echo $row['name'];?>"></div>
                    <div><input type="text" name="updateusername" value="<?php echo $row['username'];?>" ></div>
                    <div><input type="email" name="useremail" value="<?php echo $row['email'];?>"></div>
                    <input type="submit" name="update" value="update">
    </form> 
                    <?php
               }
           }
       }
       

      


?>

</body>
</html>
