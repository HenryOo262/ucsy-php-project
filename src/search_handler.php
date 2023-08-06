<?php

    session_start();

    require_once "../config.php";

    $servername = DB_HOST;
    $database   = DB_NAME;
    
    $conn = new mysqli($servername,$_SESSION["username"],$_SESSION["password"],$database);

    if($conn->connect_error) {
        die("Connection Failed");
    }

    // DBMS operations on Teaches Table
    if($_POST["submit_button"] == "select") {
        select();
    }
    else if($_POST["submit_button"] == "delete") {
        delete();
    }
    else if($_POST["submit_button"] == "details") {
        details();
    }

    $conn->close();

    // delete operation
    function delete() {
        global $conn;
        $query = "DELETE FROM teaches WHERE teaches_id = " . $_POST["teachesID"];

        $conn->query($query);

        header("Location: /admin/search");
    }
    
    // select operation
    function select() {
        global $conn;
        $instructor = $conn->real_escape_string($_POST["instructorName"]);
        $academicYear = $conn->real_escape_string($_POST["academicYear"]);
        
        if(empty($_POST["academicYear"]) && !empty($_POST["instructorName"])) {
            // if academicYear is empty 
            $query = "SELECT * FROM teaches NATURAL JOIN instructor WHERE instructor_name LIKE '%$instructor%'";
        } 
        else if(!empty($_POST["academicYear"]) && empty($_POST["instructorName"])) {
            // if instructorName is empty
            $query = "SELECT * FROM teaches NATURAL JOIN instructor WHERE academicYear = '$academicYear'";
        }
        else if(!empty($_POST["academicYear"]) && !empty($_POST["instructorName"])) {
            // if none is empty
            $query = "SELECT * FROM teaches NATURAL JOIN instructor WHERE instructor_name LIKE '%$instructor%' AND academicYear = '$academicYear'";
        }
        else if(empty($_POST["academicYear"]) && empty($_POST["instructorName"])) {
            // if both empty
            $query = "SELECT * FROM teaches NATURAL JOIN instructor";
        }

        // execute query
        $result = $conn->query($query);
    
        // data array
        $data = array();

        while($row = $result->fetch_assoc()) {
            $temp = array();
            array_push($temp,$row["teaches_id"]);
            array_push($temp,$row["instructor_name"]);
            array_push($temp,$row["academicYear"]);
            array_push($temp,$row["course_id"]);
            array_push($temp,$row["faculty_id"]);
            array_push($data,$temp);
        }
        $_SESSION["searchData"] = $data;
    
        header("Location: /admin/search/show");
    }

    // extract details of the record
    function details() {
        global $conn;
        $query = "SELECT * FROM point NATURAL JOIN question WHERE teaches_id = " . $_POST["teachesID"];
        $result = $conn->query($query);

        // data array
        $data = array();

        while($row = $result->fetch_assoc()) {
            $temp = array();
            array_push($temp, $row['question']);
            array_push($temp, $row['totally_disagree']);
            array_push($temp, $row['disagree']);
            array_push($temp, $row['neutral']);
            array_push($temp, $row['agree']);
            array_push($temp, $row['totally_agree']);
            array_push($data, $temp);
        }

        $_SESSION["detailsData"] = $data;
        header("Location: /admin/search/show/details");
    }
 
?>