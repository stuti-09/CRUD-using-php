<?php
require('db.php');
include("auth_session.php");
include("post.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet" href="css\style.css">
        <title>Dashboard</title>
        
    </head>
    <body>
    <header>
       <div class="logo">
           <h1 class="logo-text">BLOG SITE</h1>   
        </div>
        <ul class="nav">
            <?php if(isset($_SESSION['id']));?>
            <li>
                <a href="#"><i class="fa fa-user"></i>
                <?php echo $_SESSION['username']; ?>
                <i class="fa fa-chevron-down"></i></a>
                <ul>
                    <li><a href="userprofile.php" name="edit">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>    
                
    </header>
        <div>
            <?php if(isset($_REQUEST['info'])){?>
            <?php if($_REQUEST['info']=="added"){?>
            <div class="alert alert-success" role="alert">
                Post has been added successfully
            </div>
        <?php }else if($_REQUEST['info']=="updated"){?>
              <div class ="alert alert-success" role="alert">
                  Post has been updated successfully
        </div>
    <?php } else if($_REQUEST['info'] == "deleted"){?>
               <div class ="alert alert-success" role="alert">
                  Post has been deleted successfully
                </div>
    <?php }?>
   <?php }?>
   <section class="sec">
      
    
     <div class="content clearfix">
         <div class="main-content">
             
            <?php foreach($query as $q){?>
           <div class="col-12 col-lg-4 d-flex justify-content-center">
            <div class="card img-fluid text-white bg-dark mt-5" style="width:18rem;">
                    <img class="card-img-top"  <?php echo "src='images/".$q['image']."' >"; ?>
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $q['title'];?></h5>
                    <p class="card-text"><?php echo  substr($q['body'],0,50);?></p>
                    <a href="view.php?id=<?php echo $q['id'];?>" class="btn btn-light">READ MORE <span class="text-danger">&rarr;</span></a>
                    </div>
                </div>
            </div>
        
       <?php }?>
         </div>
       
    
       <div class="sidebar">
           <div class="section search">
               <h2 class="section-title">Search</h2>
               <form action="dashboard.php" method="post">
                   <input type="text" name="search-term" class="text-input" placeholder="Search....">
                </form>
            </div>
           <div class="section blog">
           <h2 class="section-title">Create Blog</h2>
           <form action="post.php" method="post" enctype="multipart/form-data">
               <div> <input type="text" name="title" class="text-input" placeholder="title" required ></div>
               <textarea name="body"  class="text-input">content</textarea>
               <div><input type="file" name="image"  class="text-input" ></div>
               <div class="btn"><button type="submit" name="add-post" class="btn">Add post</button></div>
            </form> 
            </div>
            

       </div>
    </div>
    
            
        
        
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </body>
</html>
