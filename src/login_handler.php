
<?php

    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $servername = getenv("DB_HOST");
    $database   = getenv("DB_NAME");

    try{
        $conn = new mysqli($servername,$username,$password,$database);
    }catch(Exception $e){
        $_SESSION["loginFail"] = true;
        header("Location: /admin");
        exit;
    }

    $_SESSION["logged"] = true;



?>