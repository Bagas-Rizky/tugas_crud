<?php
    require_once('function/connection.php');

    if (isset($_POST['aksi'])){
        if ($_POST['aksi'] == "add"){

            // var_dump($foto_siswa);
            // die();
            
            $nama_siswa = $_POST['nama_siswa'];
            $nisn = $_POST['nisn'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat_siswa = $_POST['alamat_siswa'];
            $foto_siswa     = $_FILES['foto_siswa']['name'];

            $dir = "img/";
            $tmpFile = $_FILES['foto_siswa']['tmp_name'];
            
            move_uploaded_file($tmpFile, $dir. $foto_siswa);

           $query = "INSERT INTO data_siswa VALUES(null, '$nama_siswa', '$nisn', '$jenis_kelamin', '$alamat_siswa', '$foto_siswa')";
           $sql = mysqli_query($koneksi, $query);

           if($sql){
            header("location: dashboard.php");

           }else {
            echo $query;
           }
        } else if ($_POST['aksi'] == "ubah"){

                $id_siswa       = $_POST['id_siswa'];
                $nama_siswa     = $_POST['nama_siswa'];
                $nisn           = $_POST['nisn'];
                $jenis_kelamin  = $_POST['jenis_kelamin'];
                $alamat_siswa   = $_POST['alamat_siswa'];
                $foto_siswa     = $_FILES['foto_siswa']['name'];

                $query          = "UPDATE data_siswa SET id_siswa = '$id_siswa', nama_siswa = '$nama_siswa', nisn = '$nisn', jenis_kelamin = '$jenis_kelamin', alamat_siswa = '$alamat_siswa', foto_siswa = '$foto_siswa' WHERE id_siswa = '$id_siswa';";
                $sql            = mysqli_query($koneksi, $query);

                if($sql){
                    header("location: dashboard.php");
        
                   }else {
                    echo $query;
                   }
            }
    }
    if (isset($_GET['hapus'])){
        $id_siswa = $_GET['hapus'];

        $queryShow = "SELECT * FROM data_siswa WHERE id_siswa = '$id_siswa';";
        $sqlShow = mysqli_query($koneksi,$queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("img/". $result['foto_siswa']);

        $query = "DELETE FROM data_siswa WHERE id_siswa = '$id_siswa'";
        $sql = mysqli_query($koneksi, $query);
        
        if($sql){
            header("location: dashboard.php");

           }else {
            echo $query;
           }
    }

?>