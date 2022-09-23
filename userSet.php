<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("OAUTH2_CLIENT_ID", "1017319444055339019");
define("OAUTH2_CLIENT_SECRET", "NyoacIeGgT9jCYXtBdm_1WjSqq5utOAg");
$token = OAUTH2_CLIENT_SECRET;

$space = "%20";
$redirectURL = "http://localhost:8000/userSet.php";

if (isset($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "none";
}

session_start();
if ($action == "login"){
    $data = [
        "client_id" => OAUTH2_CLIENT_ID,
        "redirect_uri" => $redirectURL,
        "response_type" => "code",
        "scope" => "identify"
    ];
    header("Location: https://discord.com/api/oauth2/authorize?".http_build_query($data));

    exit();
}

$redirectURL = "http://localhost:8000/userSet.php";
$data = [
    "code" => $_GET["code"],
    "client_id" => OAUTH2_CLIENT_ID,
    "client_secret"=>OAUTH2_CLIENT_SECRET,
    "redirect_uri"=>$redirectURL,
    "grant_type"=> "authorization_code"
];

$url = "https://discord.com/api/v10/oauth2/token";
$header = array("Content-Type: application/x-www-form-urlencoded");

$cl = curl_init();

curl_setopt($cl , CURLOPT_URL , $url);
curl_setopt($cl , CURLOPT_POST , true);
curl_setopt($cl , CURLOPT_POSTFIELDS , http_build_query($data));
curl_setopt($cl , CURLOPT_RETURNTRANSFER , true);
curl_setopt($cl , CURLOPT_SSL_VERIFYHOST , 0);
curl_setopt($cl , CURLOPT_SSL_VERIFYPEER , 0);
curl_setopt($cl , CURLOPT_HTTPHEADER , $header);

$result = curl_exec($cl);
$result = json_decode($result , true);

setcookie("token" , $result["access_token"] , time()+(60*60*24)*365 , "/");
header("Location: /");