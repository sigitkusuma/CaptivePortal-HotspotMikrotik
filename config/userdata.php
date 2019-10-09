<?php
//Load the database configuration file
include 'dbconfig.php';

//Convert JSON data into PHP variable
$userData = json_decode($_POST['userData']);
if(!empty($userData)){
    $oauth_provider = $_POST['oauth_provider'];
    //Check whether user data already exists in database
    $prevQuery = "SELECT * FROM userfb WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$userData->id."'";

    $prevResult = $db->query($prevQuery);
    if($prevResult->num_rows > 0){ 
        //Update user data if already exists
        $query = "UPDATE userfb SET first_name = '".$userData->first_name."', last_name = '".$userData->last_name."', email = '".$userData->email."', gender = '".$userData->gender."', locale = '".$userData->locale."', picture = '".$userData->picture->data->url."', link = '".$userData->link."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$userData->id."'";
        $update = $db->query($query);
    }else{
        //Insert user data
        $query = "INSERT INTO userfb SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$userData->id."', first_name = '".$userData->first_name."', last_name = '".$userData->last_name."', email = '".$userData->email."', gender = '".$userData->gender."', locale = '".$userData->locale."', picture = '".$userData->picture->data->url."', link = '".$userData->link."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
        $insert = $db->query($query);
    }
}
?>