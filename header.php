
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