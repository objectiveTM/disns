<?php
    if (isset($_POST["name"])){
        // session_save_path("/");
        session_start();
        // setcookie("name" , $_POST["name"] , time()+60 , "/");
        $_SESSION["name"] = $_POST["name"];
        header("Location: /index.php");


    }else{
        echo "<script>alert(':(')</script>";
        header("Location: /index.php");
    }
?>