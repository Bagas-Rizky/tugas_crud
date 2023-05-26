<?php

require_once('function/help.php');
require_once('function/connection.php');

//menangkap request

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // echo "<script>alert('". $username ."')</script>";
    
    $query = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    //mengecek pengguna
// if (mysqli_num_rows($query) > 0 ) {
    if ($query->num_rows > 0 ) {
    $row = mysqli_fetch_all($query);
    
    //Membuat session
    session_start();
    $_SESSION['id'] = $row['id'];
    header("location: " . BASE_URL . 'dashboard.php');
} else{
    echo "<script>alert('PASSWORD ATAU EMAIL SALAH KKONTOl')</script>";
    header("location: " . BASE_URL);
}
?>