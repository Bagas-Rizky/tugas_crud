<?php
    require_once('function/connection.php');

    $id_siswa = $_GET['id_siswa'];

    $query = "SELECT * FROM data_siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_object($sql);
    $no = 0;


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="fontawesome/all.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .details-wrapper {
            display: flex;
            justify-content: center;
            
        }
        .container {
            display: block;
            margin-top: 25px;
            padding: 20px;
            width: 25%;
            box-shadow: 1.5px 2.4px 10px 1px rgba(0, 0, 0, 0.2);
        }
        .container h1 {
            margin: 0;
            margin-bottom: 15px;
        }

        .foto{
            display: block;
        }

        .data_siswa {
            display: block;
        }

        #main {
            /* border: 1px solid #c3c3c3; */
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        #content-detail {
            width: 50%;
            height: 200px;
            border: 1px solid #c3c3c3;
            display: flex;
            flex-wrap: wrap;
        }

        #main div {
            width: 45%;
        }

        p.nama,.nisn,.jenis_kelamin,.alamat {
            font-weight: bold;
        }

        .back_button {
            background: #1dbcfd;
            color: white;
            font-weight: bold;
            margin-top: 1rem;
            padding: 1rem 1.5rem;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
        }

        .back_button:hover {
            background: rgba(173, 216, 230, 1);
            color: black;
        }

    </style>
  </head>
  <body>
    <div class="sidebar">
        <div class="top">
        ADMIN
        </div>
        <ul>
        <li class="active"><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="invoice.php"><i class="fa fa-user-circle"></i> Add</a></li>
        <li><a href="index.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')"><i class="fa fa-arrow-left"></i> Exit</a></li>
        </ul>
    </div>
    <div class="details-wrapper">
        <div class="container">
            <center>DATA SISWA</center></br>
            <div id="main">
                <div style="margin-right: 10px">
                    <img src="img/<?= $data->foto_siswa ?>" style="width: 150px;">
                </div>
                <div>
                    <p class="nama">Nama</p>
                    <p><?= $data->nama_siswa ?></p>
                    <br>
                    <p class="nisn">NISN</p>
                    <p><?= $data->nisn ?></p>
                    <br>
                    <p class="jenis_kelamin">Jenis Kelamin</p>
                    <p><?= $data->jenis_kelamin ?></p>
                    <br>
                    
                    <p class="alamat">Alamat</p>
                    <p><?= $data->alamat_siswa ?></p>
                    <a href="dashboard.php"><button class="back_button">Kembali</button></a>
                </div>
            </div>
        </div>
    </div>
    
  </body>
</html>
