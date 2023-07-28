<?php

session_start();

if(!isset($_SESSION["logged"])){
    $_SESSION["logged"] = false;
}

// ROUTES

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    
    case "":
    case "/":
        renderForm();
        break;

    case '/home':
        header('Location: /');  
        break;

    case '/admin':
        renderAdmin();
        break;
        
    default:
        http_response_code(404);
        
}

function renderForm(){

    // import json data 
    $json = file_get_contents('./public/text.json');

    // parse json data into array
    $data = json_decode($json,true);

    require "./public/views/form.php";
    exit;

}

function renderAdmin(){

    if($_SESSION["logged"]){
        require "./public/views/admin.php";
        exit;
    }else{
        require "./public/views/login.php";
        exit;
    }

}

?>