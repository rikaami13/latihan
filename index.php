<?php
// Koneksi Database
$server = "localhost";
$user ="root";
$pass="";
$database = "tmhs";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

// Jika Tombol Simpan di klik
if(isset($_POST['bsimpan']))
{
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi) VALUES ('$_POST[tnim]',                                '$_POST[tnama]',                                '$_POST[talamat]',                                 '$_POST[tprodi]')
    ");

    if($simpan) //jika simpan suskes
    {
        echo "<script>
            alert('simpan data sukses!');
            document.location='index.php';
             </script>";
    }

    else { //jika simpan gagal
        echo "<script>
            alert('simpan data GAGAL!');
            document.location='index.php';
             </script>";

    }

}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center" > Student Record Student Ace Education Surabaya </h1>
    
    <!--Awal Card Form -->
    <div class="container">
<div class="card mt-4">
  <div class="card-header bg-primary text-white">
    Form input data siswa
  </div>
  <div class="card-body text-black">
        <form method="post" action="">
        <div class=form-group>
        <label>Nim </label>
        <input type="text" name="tnim" class="form-control" placeholder="Input Nim disini" required>
        </div>

    <div class=form-group>
        <label>Nama </label>
        <input type="text" name="tnama" class="form-control" placeholder="Input Nama disini" required>
  </div>
  <div class=form-group>
        <label>Alamat </label>
        <textarea class="form-control" name="talamat" placeholder="Input Alamat disini" required> 
        </textarea>
  </div>
  <div class="form-group">
    <label for="Program Studi">Program Studi</label>
    <select class="form-control" >
      <option>D1-MI</option>
      <option>D3-MI</option>
      <option>D4-MI</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success" name="bsimpan" >Simpan</button>
  <button type="submit" class="btn btn-warning" name="breset">Kosongkan</button>



  </form>
    
</div>
</div>
<!-- Akhir Card Form -->

<!--Awal Card Tabel -->
<div class="container">
<div class="card mt-4">
  <div class="card-header bg-success text-white">
    Daftar Mahasiswa
  </div>
  <div class="card-body">
  <table class="table table-bordered table-striped">
  <tr>
    <th>No.</th>
    <th>Nim</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Prodi</th>
    <th>Aksi</th>
  </tr>
    <?php
    $no = 1;
    $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id desc");
    while($data=mysqli_fetch_array($tampil)):
    ?>

  <tr>
    <td><?=$no++;?></td>
    <td><?=$data['nim']?></td>
    <td><?=$data['nama']?></td>
    <td><?=$data['alamat']?></td>
    <td><?=$data['prodi']?></td>
    <td>
    <a href="#" class="btn btn-warning">Edit</a>
    <a href="#" class="btn btn-danger">Hapus</a>

    </td>
  </tr>
    <?php endwhile;   ?>
  </table>
        
</div>
</div>
<!-- Akhir Card Tabel -->

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>