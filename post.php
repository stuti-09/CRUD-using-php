<?php
require('db.php');
//table='post';
$sql="SELECT * FROM post";
$query=mysqli_query($con,$sql);

if(isset($_REQUEST["add-post"])){ 
    $title = $_REQUEST["title"];
    $body=$_REQUEST["body"];
    $image=$_FILES['image'];
    $imageName = $image ['name'];
    $fileType = $image ['type'];
    $filesize = $image['size'];
    $fileTmpName=$image['tmp_name'];
   // $filedata = explode('/',$fileType);
   // $fileExtension = $filedata[count($fileData)-1]
        $fileNewName= "images/".$imageName;
       $result= move_uploaded_file($fileTmpName, $fileNewName);
       if($result){
           $_POST['image']=$imageName;
       }
    $sql= "INSERT INTO post(title, body,image) VALUES('$title', '$body', '$imageName')";
    mysqli_query($con, $sql);
    
    header('location:dashboard.php?info=added');


}
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql="SELECT * FROM post WHERE id=$id";
    $query= mysqli_query($con,$sql);
}
if(isset($_REQUEST['update-post'])){
    $id= $_REQUEST['id'];
    $title = $_REQUEST["title"];
    $body=$_REQUEST["body"];
    $sql="UPDATE post SET title='$title',body='$body' WHERE id=$id";
    mysqli_query($con,$sql);

    header('location:dashboard.php?info=updated');
    exit();
}

if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM post WHERE id=$id";
    $query = mysqli_query($con,$sql);
    header('location:dashboard.php?info=deleted');
    exit();


}

?>

 