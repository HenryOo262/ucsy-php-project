<?php

    session_start();

    require_once "./config.php";

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

        case "/home":
            header("Location: /");  
            break;

        case "/admin":
            renderAdmin();
            break;

        case "/admin/search":
            renderSearch();
            break;

        case "/admin/search/show":
            renderShow();

        case "/admin/search/show/details":
            renderDetails();

        case "/admin/update":
            renderUpdate();
            
        default:
            http_response_code(404);
            
    }

    function renderForm() {
        $servername = DB_HOST;
        $database   = DB_NAME;

        // connect to database
        $conn = new mysqli($servername,"validator","validator2023",$database);
        if($conn->connect_error) {
            die("Connection Failed");
        }

        // declare arrays 
        $courses = array();
        $questions = array();
        $qgroups = array();

        // fetch all the courses 
        // there are 9 semesters as fixed values
        try {
            for($i=1; $i<=9; $i+=1) {
                $temp = array();
                $result = $conn->query("SELECT course_id FROM course WHERE semester='$i'");
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        array_push($temp,$row["course_id"]);
                    }
                }
                $courses[$i-1] = $temp;
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }

        // fetch question groups
        try {
            $result = $conn->query("SELECT * FROM qgroup");
            while($row = $result->fetch_assoc()){
                array_push($qgroups,$row["qgroup"]);
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }

        // fetch questions
        try {
            for($i=0; $i<count($qgroups); $i+=1) {
                $temp = array();
                $result = $conn->query("SELECT question FROM question WHERE qgroup_id = $i+1");
                while($row = $result->fetch_assoc()) {
                    array_push($temp,$row["question"]);
                }
                array_push($questions, $temp);
            }
        } catch(Exception $e) {
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
        } else {
            require "./public/views/login.php";
            exit;
        }
    }

    function renderSearch() {
        if($_SESSION["logged"]) {
            require "./public/views/search.php";
            exit;
        } else {
            header("Location: /admin");
            exit;
        }
    }

    function renderShow() {
        if($_SESSION["logged"]) {
            $data = $_SESSION["searchData"];
            require "./public/views/show.php";
            exit;
        } else {
            header("Location: /admin");
            exit;
        }
    }

    function renderDetails() {
        if($_SESSION["logged"]) {
            $data = $_SESSION["detailsData"];
            require "./public/views/details.php";
            exit;
        } else {
            header("Location: /admin");
            exit;
        }
    }

    function renderUpdate() {
        $servername = DB_HOST;
        $database   = DB_NAME;

        $conn = new mysqli($servername,$_SESSION["username"],$_SESSION["password"],$database);
        if($conn->connect_error) {
            die("Connection Failed");
        }

        if($_SESSION["logged"]) {
            $result = $conn->query("SELECT course_id FROM course");
            $data = array();
            while($row = $result->fetch_assoc()) {
                array_push($data,$row["course_id"]);
            }
            require "./public/views/update.php";
            exit;
        } else {
            header("Location: /admin");
            exit;
        }
    }

?>