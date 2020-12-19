<?php
require 'conn.php';

session_start();
$query = mysqli_query($conn, "SELECT * FROM distributor");   
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
   <center><h1 class="mt-5 mb-5">Distributor</h1></center>
  
    <?php if(isset($_SESSION['add'])): ?>
    <div class="alert alert-primary" role="alert" onclick="remove(this);">
  Berhasil tambah data!
</div>
<?php unset($_SESSION['add']);?> 


    <?php endif;?>
    <?php if(isset($_SESSION['alert'])): ?>
    <div class="alert alert-primary" role="alert" onclick="remove(this);">
  Berhasil edit data!
</div>
<?php unset($_SESSION['alert']);?> 


    <?php endif;?>
    <?php if(isset($_SESSION['delete'])): ?>
    <div class="alert alert-primary" role="alert" onclick="remove(this);">
  Berhasil hapus data!
</div> 
<?php unset($_SESSION['delete']);?> 


    <?php endif;?>
    
    <table class="table table-dark" >
  <thead><th scope="row">No</th>
      <th scope="col">Name</th>
      <th scope="col">Alamat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i =1; ?>
  <?php while ($row = mysqli_fetch_assoc($query)): ?>
    <tr>
      <th scope="row"><?=$i++; ?></th>
      <td><?= $row['names']?></td>
      <td><?= $row['alamat']?></td>
      <td><a href="distributor/edit.php?id=<?= $row['id'];?>"><img src="img/edit.png" width="30px"></a>|<a href="distributor/delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Messagge'); "><img src="img/trash.png"  width="30px"></td>
     
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>

    <!-- button back -->
    <button type="button" class="btn btn-link mt-5 float-right" onclick="document.location.href='home.php';">Back</button>

    <script src="js/bootstrap.bundle.min.js">
    </script>
    <script src="js/script.js">

    </script>

  
  </body>
</html>