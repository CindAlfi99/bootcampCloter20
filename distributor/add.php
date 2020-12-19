
<?php
session_start();
require '../conn.php';

if(isset($_POST['submit'])){


  $name = $_POST['name'];
    $address= $_POST['address'];
    $query = mysqli_query($conn, "INSERT INTO distributor VALUES('','$name','$address')");
    if(isset($query)){
     $_SESSION['add'] = true;
 
 if (mysqli_affected_rows($conn) > 0) {
  header('Location: ../listdistributor.php');
}
    }
  
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

    <title>Hello!</title>
  </head>
  <body>

 <div class="container">
 <form class="mt-4" method="post" action="">
      <div class="form-row d-block">
   
        <div class="form-group ">
          <label for="nameguru">Name </label>
          <input type="text" name="name" class="form-control" id="namesiswa">
        </div>
        <div class="form-group">
        <div>
        
  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="address"></textarea>
</div>
        </div>
      </div>      
      <button type="submit" name="submit" class="btn btn-primary">Add data</button>
    </form>
    <!-- button back -->
    <button type="button" class="btn btn-link mt-5 float-right" onclick="document.location.href='../home.php';">Back</button>
  </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>