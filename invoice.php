<?php
    require_once('function/connection.php');

    $id_siswa     = '';
    $nama_siswa = '';
    $nisn = '';
    $jenis_kelamin = '';
    $alamat_siswa = '';
    $foto_siswa = '';

    if(isset($_GET['ubah'])){
        $id_siswa     = $_GET['ubah'];

        $query  = "SELECT * FROM data_siswa WHERE id_siswa = '".$id_siswa."'";
        $sql    = mysqli_query($koneksi, $query);

        $result = mysqli_fetch_assoc($sql);
        
        $nama_siswa = $result['nama_siswa'];
        $nisn = $result['nisn'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $alamat_siswa = $result['alamat_siswa'];
        $foto_siswa = $result['foto_siswa'];

    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="fontawesome/all.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="invoice.css">
  </head>
  <body>
    <main>
        <div class="sidebar">
            <div class="top">ADMIN</div>
                <ul>
                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="active"><a href="invoice.php"><i class="fa fa-user-circle"></i> Add</a></li>
                    <li><a href="index.php"><i class="fa fa-arrow-left"></i> Exit</a></li>
                </ul>
        </div>
    </main>
    <div class="container_form">
        <div class="wrapper">
            <h2><i class="fa fa-user-circle"></i> DATA SISWA</h2>

            <form action="proses_data.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa;?>" name="id_siswa">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input required type="text" name="nama_siswa" value="<?php echo $nama_siswa;?>">
                </div>
                <div class="form-group">
                    <label for="">Nisn</label>
                    <input required type="text" name="nisn" value="<?php echo $nisn;?>">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select required name="jenis_kelamin" id="jenis_kelamin" class="myselect">
                        <option <?php if($jenis_kelamin == 'Perempuan'){ echo "selected"; }?> value="Perempuan">Perempuan</option>
                        <option <?php if($jenis_kelamin == 'Laki-Laki'){ echo "selected"; }?> value="Laki-Laki">Laki-Laki</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input required type="text" name="alamat_siswa" value="<?php echo $alamat_siswa;?>">>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input required type="file" name="foto_siswa" id="foto">
                </div>
                <?php
                    if (isset($_GET['ubah'])){
                ?>
                <div class="form-group">
                    <button type="submit" class="submit" name="aksi" value="ubah">Simpan</button>
                </div>
                <?php  
                    } else {
                ?>
                <div class="form-group">
                    <button type="submit" class="submit" name="aksi" value="add">Tambahkan</button>
                </div>
                <?php
                    }
                ?>
            </form>
        </div>
    </div>
  </body>