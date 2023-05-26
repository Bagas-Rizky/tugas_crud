<?php
    require_once('function/connection.php');

    $query = "SELECT * FROM data_siswa;";
    $sql = mysqli_query($koneksi, $query);
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
    <link rel="stylesheet" href="dashboard.css">
  </head>
  <body>
    <main>
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
    </main>
    <h1>DATA SISWA</h1>
        <div class="wrapper">
        <!-- <h1>DATA SISWA</h1> -->
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><?php echo ++$no;?>.</td>
                        <td><?php echo $result['nisn'];?></td>
                        <td><?php echo $result['nama_siswa'];?></td>
                        <td><a href="invoice.php?ubah=<?php echo $result['id_siswa'];?>"><button class="button_action"><i class="fa fa-user-circle"></i> Edit</button></a> <a href="proses_data.php?hapus=<?php echo $result['id_siswa'];?>" onclick="return confirm('Apakah Anda Yakin Menghapusnya?')"><button class="button_action"><i class="fa fa-trash"></i> Delete</button></a></td>
                        <td><a href="details.php?id_siswa=<?= $result['id_siswa'];?>"><button class="button_detail">Info</button></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
  </body>
</html>
