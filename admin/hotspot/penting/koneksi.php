
	<?php 
		 include("routeros_api.php");
		 $API = new routeros_api();
		 if (!$API->connect("71a306971b23.sn.mynetname.net","admin","admin")){
			 unset($_SESSION["user"]);
			 header("location:login.php");
		 }
	?>