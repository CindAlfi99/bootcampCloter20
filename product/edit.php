<?php

require '../conn.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$query =  mysqli_query($conn, "SELECT * FROM product WHERE id=$id");
$result = mysqli_fetch_assoc($query);
}

if(isset($_POST['submit'])){
  // echo var_dump($_POST);
  // exit;
  $id = $_GET['id'];
  $name = $_POST['name'];
$image = $_POST['foto'];
$desc = $_POST['description'];
$nutrisi = $_POST['nutrisi'];
$porsi = $_POST['porsi'];
$iddist = $_POST['iddist'];
    $query = mysqli_query($conn, "UPDATE product SET namesP = '$name', photos = '$image', descc ='$desc',nutrisi ='$nutrisi',serving_size ='$porsi',id_distribusi ='$iddist' WHERE id=$id");
//     echo 'berhasil';
    
 if (mysqli_affected_rows($conn) > 0) {
  echo "<script>alert('data berhasil diubah!');
  document.location.href='../index.php';</script>";
 

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

    <title>Edit</title>
  </head>
  <body>

 <div class="container">
 <form class="mt-4" method="post" action="">
      <div class="form-row d-block">
   
        <div class="form-group ">
          <label for="nameguru">Name </label>
          <input type="text" name="name" class="form-control" id="namesiswa" value="<?= $result['namesP']; ?>">
        </div>
        <div class="form-group">
        <div>
        
        <label for="inputZip">Foto</label>
        <div class="input-group mb-5">
  <input type="text" class="form-control" id="inputGroupFile02" name="foto" value="<?= $result['photos']; ?>">
  <label class="input-group-text" for="inputGroupFile02" >Upload</label>
</div>
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"><?= $result['descc']; ?></textarea>
</div>
        </div>
        <div class="form-group ">
          <label for="nameguru">Nutrisi </label>
          <input type="text" name="nutrisi" class="form-control" id="namesiswa" value="<?= $result['nutrisi']; ?>">
        </div>
   

        
        

      </div>

      <div class="form-row d-block">
        <div class="form-group">
          <label for="inputCity">Porsi</label>
          <input type="number" name="porsi" class="form-control" id="inputCity" value="<?= $result['serving_size']; ?>">
        </div>
        <div class="form-group ">
          <label for="nameguru">Id_distribusi </label>
          <select class="custom-select" name="iddist">
            <option selected>Pilih Id_distribusi</option>
            <?php  $numbers = [1,2,3,4,5];?>
            <?php foreach( $numbers as $num): ?>
            <option value="<?=$num; ?>" <?= $result['id_distribusi'] == $num ? "selected" : "" ?>><?=$num; ?></option>
<?php endforeach; ?>

          </select>
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