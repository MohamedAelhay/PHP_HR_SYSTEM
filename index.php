<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("autoload.php");

define("_ALLOW_ACCESS", 1);
session_start();
session_regenerate_id();

$mainDb = new DataBaseHandler("users_info");
$userEntry = new UserEntry($mainDb);
if (!$mainDb){
    exit('NO CONNECTION');
}

/*
$data = $mainDb-> get_Data_By_Id(1);

foreach ($data as $key => $value){
    echo $key . " : " .$value . "</br>";
}
echo $data["email"];*/
//echo $mainDb->get_Data_By_Email("admin@admin.com");
//var_dump($_SESSION);
//********************************************//
//Routing

if (isset($_SESSION["user_id"]) && $_SESSION["is_admin"] === true) {
    //admin views should be required here
} elseif (isset($_SESSION["user_id"]) && $_SESSION["is_admin"] === false) {
    //members views should be required here
} elseif (isset($_GET["sign"]) || isset($_POST['submit'])){
    // Sign Up
    require_once ("Views/public/Register/signup.php");
} else {
    //public views should be required here
    require_once ("Views/public/Login/login.php");
}
//********************************************//