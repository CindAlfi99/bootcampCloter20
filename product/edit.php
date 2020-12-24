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
  $image = $_FILES['foto']['name'];
  $imagesEror = $_FILES['foto']['error'];
  $imageLama = $_POST['gambarLama'];
  //cek apakah user memilih gambar baru atau tidak
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];  
  $ektendGambarValid = ['jpg','jpeg','png'];
  $ekstendGambar = explode('.',$image);
  $ekstendGambar = strtolower(end($ekstendGambar));
  //batas
  $desc = $_POST['description'];
$nutrisi = $_POST['nutrisi'];
$porsi = $_POST['porsi'];
$iddist = $_POST['iddist'];
  if($imagesEror==4){
    $image = $imageLama;
    $query = mysqli_query($conn, "UPDATE product SET namesP = '$name', photos = '$image', descc ='$desc',nutrisi ='$nutrisi',serving_size ='$porsi',id_distribusi ='$iddist' WHERE id=$id");
    if (mysqli_affected_rows($conn) > 0) {
      echo "<script>alert('data berhasil diubah!');
      document.location.href='../home.php';</script>";
     
    
        }
    // header("Location: ../home.php");

  }else if(isset($image)){
  
    if(!in_array($ekstendGambar,$ektendGambarValid)){
      echo "<script>alert('bukan  gambar');</script>";
     
      exit;
    }
    // //cek jika ukuran terlalu besar
    if($ukuranFile > 1000000){
      echo "<script>alert('ukuran gambar terlalu besar');</script>";
     
      exit;
    }
    //lolos cek
    //generate nama gambar baru
    
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstendGambar;
   
    move_uploaded_file($tmpName,'img/'.$namaFileBaru);
    // echo "<script>alert('data berhasil ditambah')</script>";

    $query = mysqli_query($conn, "UPDATE product SET namesP = '$name', photos = '$namaFileBaru', descc ='$desc',nutrisi ='$nutrisi',serving_size ='$porsi',id_distribusi ='$iddist' WHERE id=$id");
//     echo 'berhasil';
 if (mysqli_affected_rows($conn) > 0) {
  echo "<script>alert('data berhasil diubah!');
  document.location.href='../home.php';</script>";
 

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

    <title>Edit</title>
  </head>
  <body>

 <div class="container">
 <form class="mt-4" method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="gambarLama" value="<?= $result['photos']; ?>">
      <div class="form-row d-block">
   
        <div class="form-group ">
          <label for="nameguru">Name </label>
          <input type="text" name="name" class="form-control" id="namesiswa" value="<?= $result['namesP']; ?>">
        </div>
        <div class="form-group">
        <div>
        
        <!-- <label for="inputZip">Foto</label>
        <div class="input-group mb-5">
  <input type="text" class="form-control" id="inputGroupFile02" name="foto" value">
  <label class="input-group-text" for="inputGroupFile02" >Upload</label>
</div> -->
<label for="inputZip">Foto</label><br>
<img src="img/<?=$result['photos'] ?>" alt="">
        <div class="input-group mb-3">
        
  <input type="file" class="form-control" id="inputGroupFile02" name="foto">
  <label class="input-group-text" for="inputGroupFile02">Upload</label>
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