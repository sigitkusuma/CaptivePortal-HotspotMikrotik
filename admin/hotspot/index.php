<?php 
	ini_set( "display_errors", 0); 
	session_start();
	// Cek Login
	if (isset($_SESSION['user'])){  
		require_once("penting/koneksi.php"); 
	?>	
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>User Hotspot ITN Malang</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
    <script src="lib/jquery-1.8.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="lib/jquery.validate.min.js"></script>
    <link rel="shortcut icon" href="images/logo_mikrotik.png">
 </head>

  <body> 
	<script>var $jnoc = jQuery.noConflict();</script>
    
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
						<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $_SESSION['user']; ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="index.php?halaman=profile">Profile User</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="sidebar-nav">
                  <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-user"></i>Add User Hotspot</div>
                    <ul id="dashboard-menu" class="nav nav-list collapse in">           
						          <li ><a href="index.php?halaman=tambah_user_hotspot">Tambah User Hotspot</a></li>
                    </ul>		
				<div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-wrench"></i>Extra Menu</div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                  <li ><a href="#ModalReboot" role="button" data-toggle="modal">Reboot Mikrotik</a></li>
                </ul>
            </div>
        </div>
      
	  <?php 

			@$hal=$_GET['halaman'];
			if(!$hal){ include "halaman/utama.php"; }
			else {
			switch($hal){
			case "tambah_user_hotspot" : include "halaman/tambah_user_hotspot.php"; break;
			case "reboot_mikrotik" : include "halaman/reboot_mikrotik.php"; break;
			case "profile" : include "halaman/profile.php"; break;
			default : include "halaman/utama.php"; break;
			}
			}
		?>
    </div>  
    <script src="lib/bootstrap/js/bootstrap.js"></script>
 <div class="modal small hide fade" id="ModalReboot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Reboot Mikrotik</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Anda yakin akan Me-Reboot Mikrotik ?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
    <button class="btn btn-danger" id="reboot" data-dismiss="modal">Ya!</button>
  </div>
</div>
  <script src="aksi/js/reboot/reboot.js"></script>
  </body>
</html>

<?php } else {
		header("location:login.php");
	}
	?>


