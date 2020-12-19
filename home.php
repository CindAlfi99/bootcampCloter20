<?php
 require 'conn.php';
 require 'template/template.php';
$query = mysqli_query($conn, "SELECT * FROM product 
JOIN distributor
ON product.id_distribusi = distributor.id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Frozen Food</title>
  
</head>

<body>

<h1 class="mt-5 m-3">Varian Menu</h1>

<div style="float:right;" class="mr-5 "><a href="product/add.php"><button class="btn btn-primary">Tambah Product</button></a></div>
<div style="float:right;" class="mr-5 "><a href="distributor/add.php"><button class="btn btn-primary">Tambah Distributor</button></a></div>
<br>
<div class="row mt-5 m-5">


<?php while ($row = mysqli_fetch_assoc($query)):  ?>
  <div class="col-3 mt-5">
  <div class="card " style="width: 18rem;">
  <img src="img/<?= $row['photos']?>" class="card-img-top" >
  <div class="card-body">
    <h5 class="card-title"><?= $row['namesP'] ?></h5>
    <p class="card-text"><?= $row['names']?></p>
   
  </div>
  
<a href="product/detail.php?id=<?=$row['id']; ?>" class="btn btn-primary">Detail</a>

</div>
</div>
<?php endwhile; ?>

</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>