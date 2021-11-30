<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    
    <title>Registration</title>
</head>
<body>
<?php
    require('db.php');
    
    if (isset($_REQUEST['submit'])) {
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $cpassword = stripslashes($_REQUEST['cpassword']);
        $cpassword = mysqli_real_escape_string($con, $cpassword);
        
        
        $sql_u = "SELECT * FROM users WHERE username='$username'";
        $sql_e = "SELECT * FROM users WHERE email='$email'";
        $res_u = mysqli_query($con, $sql_u);
        $res_e = mysqli_query($con, $sql_e);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 5) {
            echo "Password should be at least 5 characters in length and should include at least one upper case letter, one number, and one special character";
  }
        else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            echo "Name must contain only alphabets and space";
        }
        else if(!preg_match('/^[a-zA-Z0-9]{5,}$/',$username)){
            echo"invalid username";
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "Invalid email format";
        }
        
        else if($password != $cpassword) {
            echo "Password and Confirm Password doesn't match";
        }

        else if(mysqli_num_rows($res_u)>0){
            echo "<h3>username already exists.</h3>
                  <p>Click here to <a href='login.php'>Login</a></p>";
        }else if(mysqli_num_rows($res_e)>0){
            echo "<h3>email is already registered.</h3>
                  <p>Click here to <a href='login.php'>Login</a></p>";
        }else{
             $query    = "INSERT into users (name, username, password, email)
                     VALUES ('$name','$username', '" . md5($password) . "', '$email')";
             $result   = mysqli_query($con, $query);
             if ($result) {
                echo "<div>
                <h3>You are registered successfully.</h3>
                <p>Click here to <a href='login.php'>Login</a></p></div>";

            }
             else {
                echo "<div>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
            }
        }
         
    } else {
?>
 <div class="auth-content">
    <form action="registration.php" method="post">
        <h1 class="form-title">Sign up</h1>
        <div><input type= "text" name="name" class="text-input" placeholder="Full name" required></div>
        <div><input type="text"  name="username" class="text-input" placeholder="Username" required ></div>
        <div><input type="text"  name="email" class="text-input" placeholder="Email Address" required ></div>
        <div><input type="password"  name="password" class="text-input" placeholder="Password" required></div>
        <div><input type="password"  name="cpassword" class="text-input" placeholder="Confirm Password" required></div>
        <div><input type="submit" name="submit" class="btn btn-big" value="submit" ></div>
        <p class="link">Already have an account? <a href="login.php">Click to Login</a></p>
    </form>
 </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="js/scripts.js"></script>
<?php
    }
?>
</body>
</html>