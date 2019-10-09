<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
require("../config/koneksi.php");

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($con,"select * from admin where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:index.php?page=home");
}else{
	header("location:login_page.php?pesan=gagal");
}
?>