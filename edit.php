<?php
require('db.php');
include("auth_session.php");
include("post.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        
    </head>
    <body>
        <div>
            <?php foreach($query as $q){?>
                
            
            <h2>EDIT POST</h2>
            <form method="GET">
                <div><input type="text" hidden name="id" value="<?php echo $q["id"];?>"></div>
                <div><input type="text" name="title" placeholder="Title" value="<?php echo $q["title"];?>"></div>
                <div><textarea name="body" placeholder="content" required><?php echo $q["body"];?></textarea>
            
                <div><button type="submit" name="update-post">update</button></div>
            </form>
            <?php }?>
        </div>
       
    </body>
</html>
