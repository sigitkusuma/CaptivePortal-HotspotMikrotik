<?php 
		 include("routeros_api.class.php");
		 $API = new RouterosAPI();
		 if (!$API->connect("71a306971b23.sn.mynetname.net', 'admin', 'admin")){
			 unset($_SESSION["user"]);
			 header("location:index.php");
		 }
	?>