<?php
 require '../conn.php';
  $id = $_GET['id'];
     $query = mysqli_query($conn, "SELECT product.namesP, product.photos, product.descc, product.nutrisi, product.serving_size, distributor.names FROM product 
JOIN distributor
ON product.id_distribusi = distributor.id
WHERE product.id=$id");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <title>Frozen Food</title>
  
</head>

<body>

<div>

  <div class="card mb-3 m-5 p-5" style="max-width: 800px;">
 <div class="row g-0">
      <div class="col-md-4">
      <?php while ($row = mysqli_fetch_assoc($query)):  ?>
      <img src="img/<?=$row['photos'];?>" width="350px" >
      </div>
      </div>
     
      
      <!-- <div class="col-md-8"> -->
      <div class="card-body">
        <h5 class="card-title"><?=$row['namesP']; ?></h5>
        <p class="card-text"><?=$row['descc']; ?></p>
        <p class="card-text"><b>Nutrisi</b>: <?=$row['nutrisi']; ?></p>
        <p class="card-text"><b>Porsi</b>: <?=$row['serving_size']; ?></p>
         <a href="edit.php?id=<?=$row['id']; ?>" class="btn btn-primary">Edit</a>
         <a href="delete.php?id=<?=$row['id']; ?>" class="btn btn-primary">Delete</a>
      <!-- </div> -->
    </div>
      <?php endwhile; ?>
       <!-- button back -->
  
 </div>
 <button type="button" class="btn btn-link ml-5" onclick="document.location.href='../home.php';">Back</button>
  </div>
 
</div>

    
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>