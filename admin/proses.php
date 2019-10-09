<?php
require('../config/koneksi.php');
require('../config/routeros_api.class.php');
$fullname  = htmlspecialchars($_POST['fullname']);
$nim   = $_POST['nim'];
$passwd  = htmlspecialchars($_POST['password']);
$cpasswd  = htmlspecialchars($_POST['cpassword']);
$email   = htmlspecialchars($_POST['email']);
if($fullname == "" || $nim == "" || $passwd == "" || $cpasswd == "" || $email == ""){
 header("location:index.php?alert=Silahkan diisi dengan benar"); 
 exit; 
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
header("location:index.php?alert=E-mail tidak valid");
 exit;
}
if($passwd != $cpasswd){
 header("location:index.php?alert=Password tidak benar");
 exit;
}
?>
<script type="text/javascript">
function closeWin(){
window.close();
}
</script>
<?php
//proses pengecekkan nim yang di input mahasiswa apakah sesuai //dengan nim yang ada di database akademik
$cek_real_nim = mysql_query("select * from mahasiswa where nim = '$nim'") or die (mysql_error());
if(mysql_num_rows($cek_real_nim) == 0){
 header("location:./index.php?alert=NIM tidak terdaftar");
 exit; }
//cek email terdaftar
$cek_email = mysql_query("select * from tuser where email = '$email'") or die (mysql_error());
if(mysql_num_rows($cek_email) != 0){
 header("location:./index.php?alert=Email sudah terdaftar");
 exit;
}

//cek nim di tabel user, tabel ini berguna untuk melihat daftar //user dimana nanti user di tabel ini bisa diupdate dan di delete //tanpa mengganggu database mahasiswa di akademik
$passwd = MD5($passwd);
$cek_nim = mysql_query("select * from tuser where nim = '$nim'") or die (mysql_error());
if(mysql_num_rows($cek_nim) == 0){
$query = mysql_query("insert into tuser values (0,'$nim','$passwd','$fullname','$email')") or die (mysql_error());
//membuat objek api
$API = new RouterosAPI()();
//jika ingin melihat output dari API di set true
$API->debug = false;
//koneksi ke mikrotik, user disini bukan user hotspot, tapi user login ke mikrotik
if ($API->connect('27.131.6.46', 'superadmin', 'adi098')) {   // Change this as necessery
    $user = array(1 => array('name' => "$nim", 'password' => "$passwd"),
      );
 foreach($user as $tmp)
 {
  $username="=name=";
  $username.=$tmp['name'];
  $pass="=password=";
  $pass.=$tmp['password'];
  $server="=server=";
  $server.='all';
  $profile="=profile=";
  $profile.='mahasiswa';
     $API->write('/ip/hotspot/user/add',false);
     $API->write($username, false);
     $API->write($pass, false);
     $API->write($server, false);
  $API->write($profile);
  $ARRAY = $API->read();
 }
echo "<center>";
echo "Anda sudah terdaftar di Hotspot STIKOM Dinamika Bangsa Jambi : <br /> Username : $nim <br /> Password : $passwd <br />";
echo "<input type=button name=tutup id=tutup onclick='closeWin()' value=Tutup />";
echo "</center>";
    $API->disconnect();
}
}else{
 header("location:./index.php?alert=Nim Anda sudah terdaftar");
 exit; }
?>