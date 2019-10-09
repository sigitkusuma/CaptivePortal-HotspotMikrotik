<?php
include '../config/koneksi.php';

if(isset($_GET['del']))
$id=$_GET['del'];

if(isset($_GET['data']))
{
switch($_GET['data'])
{       
            
    case 'list_berita':
    $data=mysqli_fetch_row(mysqli_query($con,"select gambar from berita where id='$id'"));
    unlink("img/$data[0]");
    mysqli_query($con,"delete from berita where id='$id'");
     header("location:index.php?page=list_berita");
    break;   
}
}
?>