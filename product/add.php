<?php
session_start();
require '../conn.php';

if(isset($_POST['submit'])){
  // var_dump($_POST);
  // exit;
  // var_dump($_FILES); die;

  $name = $_POST['name'];

// $image = $_POST['foto'];
//uplod gambar
// $image = upload();
// function upload(){
//  if(isset($image)){

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];  
    $error = $_FILES['foto']['error'];  
    $ektendGambarValid = ['jpg','jpeg','png'];
    $ekstendGambar = explode('.',$namaFile);
    $ekstendGambar = strtolower(end($ekstendGambar));
    // //cek ada tidak gmbar 
    if(isset($namaFile)){
    if($error ==4){
      echo "<script>alert('masukkan gambar');</script>";
     
      exit;
    }
    // //cek gambar atau bukan
    
    // $ektendGambarValid = ['jpg','jpeg','png'];
    // $ekstendGambar = explode('.',$namaFile);
    // $ekstendGambar = strtolower(end($ekstendGambar));
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
   
    move_uploaded_file($tmpName,'img/'.$namaFile);
    echo "<script>alert('data berhasil ditambah')</script>";
    // return $namaFile;
    

// }
// }

// if(!$image){
//   echo "<script>alert('bukan gambar')</script>";
//   return false;
   
}


$desc = $_POST['description'];
$nutrisi = $_POST['nutrisi'];
$porsi = $_POST['porsi'];
$iddist = $_POST['iddist'];

    $query = mysqli_query($conn, "INSERT INTO product VALUES('','$name','$namaFile','$desc','$nutrisi','$porsi','$iddist')");
//     echo 'berhasil';
    if(isset($query)) {
     $_SESSION['add'] = true;
 
 if (mysqli_affected_rows($conn) > 0) {
  header('Location: ../home.php');
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

    <title>Add</title>
  </head>
  <body>

 <div class="container">
 <form class="mt-4" method="post" action="" enctype="multipart/form-data">
      <div class="form-row d-block">
   
        <div class="form-group ">
          <label for="nameguru">Name </label>
          <input type="text" name="name" class="form-control" id="namesiswa">
        </div>
        <div class="form-group">
        <div>
        
         <label for="inputZip">Foto</label>
        <div class="input-group mb-3">
  <input type="file" class="form-control" id="inputGroupFile02" name="foto">
  <label class="input-group-text" for="inputGroupFile02">Upload</label>
</div> 
         
        <!-- <label for="inputZip">Foto</label>
        <div class="input-group mb-5">
  <input type="text" class="form-control" id="inputGroupFile02" name="foto">
  <label class="input-group-text" for="inputGroupFile02" >Upload</label>
</div> -->
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"></textarea>
</div>
        </div>
        <div class="form-group ">
          <label for="nameguru">Nutrisi </label>
          <input type="text" name="nutrisi" class="form-control" id="namesiswa">
        </div>
   

        
        

      </div>

      <div class="form-row d-block">
        <div class="form-group">
          <label for="inputCity">Porsi</label>
          <input type="number" name="porsi" class="form-control" id="inputCity">
        </div>
        <div class="form-group ">
          <label for="nameguru">Id_distribusi </label>
          <select class="custom-select" name="iddist">
            <option selected>Pilih Id_distribusi</option>
            <?php  $numbers = [1,2,3,4,5];?>
            <?php foreach( $numbers as $num): ?>
            <option value="<?=$num; ?>"><?=$num; ?></option>
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