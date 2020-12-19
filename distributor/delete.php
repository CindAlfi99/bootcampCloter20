<?php
session_start();
require '../conn.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM distributor WHERE id=$id");
if($query){
    $_SESSION['delete'] = true;
    echo  "<script>window.location ='../listdistributor.php' </script> ";

}
}else{
    echo "<script>
    window.location ='../listdistributor.php'
    </script>";
    
    exit;
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <title>Delete</title>
  </head>
  <body>


    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>