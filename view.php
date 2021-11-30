<?php
include("post.php");
require('db.php');
include("auth_session.php");
include("header.php")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <title>blog</title>
    </head>
    <body>
        <?php foreach($query as $q){?>
        <div>
            <h1>Blog</h1>
            <?php echo "<img src='images/".$q['image']."' >"; ?>
            <p><?php echo $q['title'];?></p>
            <p><?php echo $q['body'];?></p>
            <div><a href="edit.php?id=<?php echo $q['id'];?>"><button>Edit</button></div>

            <form method="POST">
                <input type="text" hidden name="id" value="<?php echo $q["id"];?>">
                <button name="delete">Delete</button>
            </form>
        </div>
        
        <?php }?>
