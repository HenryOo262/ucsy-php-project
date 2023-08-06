<?php

    session_start();

    require_once "./config.php";

    if(!isset($_SESSION["logged"])){
        $_SESSION["logged"] = false;
    }

    // ROUTES

    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        
        case '':
        case '/':
            renderForm();
            break;

        case '/home':
            header('Location: /');  
            break;

        case '/admin':
            renderAdmin();
            break;

        case '/admin/search':
            renderSearch();
            break;

        case '/admin/search/show':
            renderShow();

        case '/admin/search/show/details':
            renderDetails();
            
        default:
            http_response_code(404);
            
    }

    function renderForm() {
        $servername = DB_HOST;
        $database   = DB_NAME;

        // import json data 
        $json = file_get_contents('./public/text.json');

        // parse json data into array
        $data = json_decode($json,true);

        // connect to database
        $conn = new mysqli($servername,"validator","validator2023",$database);
        if($conn->connect_error) {
            die("Connection Failed");
        }

        // declare courses array 
        $courses = array();

        // fetch all the courses and put them into 2D array
        // there are 9 semesters
        try{
            for($i=1; $i<=9; $i+=1) {
                $temp = array();
                $result = $conn->query("SELECT course_id FROM course WHERE semester='$i'");
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        array_push($temp,$row["course_id"]);
                    }
                }
                $courses[$i-1] = $temp;
            }
        }catch(Exception $e) {
            echo $e->getMessage();
        }

        require "./public/views/form.php";
        $conn->close();
        exit;
    }

    function renderAdmin() {
        if($_SESSION["logged"]) {
            require "./public/views/dashboard.php";
            exit;
        }else{
            require "./public/views/login.php";
            exit;
        }
    }

    function renderSearch() {
        if($_SESSION["logged"]) {
            require "./public/views/search.php";
            exit;
        }else{
            header("Location: /admin");
            exit;
        }
    }

    function renderShow() {
        if($_SESSION["logged"]) {
            $data = $_SESSION["searchData"];
            require "./public/views/show.php";
            exit;
        }else{
            header("Location: /admin");
            exit;
        }
    }

    function renderDetails() {
        if($_SESSION["logged"]) {
            $data = $_SESSION["detailsData"];
            require "./public/views/details.php";
            exit;
        }else{
            header("Location: /admin");
            exit;
        }
    }

?>