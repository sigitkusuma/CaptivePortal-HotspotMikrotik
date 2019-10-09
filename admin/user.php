<?php
// $user=$_GET['user'];
// $nama=$_GET['nama'];
// $pass=$_GET['user'];
require('../config/routeros_api.class.php');
$API = new RouterosAPI();
$API->debug = true;
if ($API->connect('71a306971b23.sn.mynetname.net', 'admin', 'admin')) {
$API->comm("/ip/hotspot/user/add", array(
"name" => "coba",
"profile" => "facebook",
"limit-uptime" => "00:60:00",
"comment" => "coba",
"password" => "coba",
));
$READ = $API->read(false);
$ARRAY = $API->parse_response($READ);
print_r($ARRAY);
$API->disconnect();
}
?>