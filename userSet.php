<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("OAUTH2_CLIENT_ID", "1017319444055339019");
define("OAUTH2_CLIENT_SECRET", "z1bEluvsK4-b5EfTYhZsOw3EAsF2IJnh");

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

$redirectURL = "http://localhost:8000";

if (!isset($_GET["code"])){
    if (!isset($_COOKIE["code"])){
        echo "code not found";
        exit();
    }
}else{
    if (!isset($_COOKIE["code"])){
        // setcookie("code" , $_GET["code"] , time()+(60*60*24)*365 , "/");
    }
}

$data = [
    "code" => $_GET["code"],
    "client_id" => "1017319444055339019",
    "client_secret"=>"z1bEluvsK4-b5EfTYhZsOw3EAsF2IJnh",
    "redirect_uri"=>$redirectURL,
    "grant_type"=> "authorization_code",
    "scope"=> "identify"
];

$url = "https://discordapp.com/api/oauth2/token";
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
if (!$result){
    echo curl_error($cl);
}


$result = json_decode($result , true);
$token = "z1bEluvsK4-b5EfTYhZsOw3EAsF2IJnh";
echo $token;
$userUrl = "https://discordapp.com/api/users/@me";
$header = array("Authorization: Bearer $token" , "Content-Type: application/x-www-form-urlencoded");

$cl = curl_init();
curl_setopt($cl , CURLOPT_HTTPHEADER , $header);
curl_setopt($cl , CURLOPT_URL , $userUrl);
curl_setopt($cl , CURLOPT_POST , false);
curl_setopt($cl , CURLOPT_RETURNTRANSFER , true);
curl_setopt($cl , CURLOPT_SSL_VERIFYHOST , 0);
curl_setopt($cl , CURLOPT_SSL_VERIFYPEER , 0);

$result = curl_exec($cl);

echo $result;
