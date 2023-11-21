<?php

    session_start();

    require_once "./config.php";

    if(!isset($_SESSION["logged"])){
        $_SESSION["logged"] = false;
    }

    if(!isset($_SESSION["student_logged"])){
        $_SESSION["student_logged"] = false;
    }

    // ROUTES

    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        
        case "":
        case "/":
            renderLogin();
            break;

        case "/home":
            header("Location: /");  
            break;

        case "/form":
            renderForm();
            break;

        case "/admin":
            renderAdmin();
            break;

        case "/admin/search":
            renderSearch();
            break;

        case "/admin/search/show":
            renderShow();
            break;

        case "/admin/search/show/details":
            renderDetails();
            break;

        case "/admin/create":
            renderCreate();
            break;
        
        case "/admin/search/update":
            renderUpdate();
            break;
            
        default:
            http_response_code(404);
            
    }

    function renderForm() {
        if($_SESSION["logged"] || $_SESSION["student_logged"]) {
            $servername = DB_HOST;
            $database   = DB_NAME;
            $username   = STUDENT;
            $password   = STUDENT_PASS;

            try {
                // connect to database
                $conn = new mysqli($servername,$username,$password,$database);
                if($conn->connect_error) {
                    die("Connection Failed");
                }

                // declare arrays 
                $courses    = array();
                $questions  = array();
                $qgroups    = array();
                $qgroups_id = array();

                // burmese numbers
                $mmnum = NUM_MAP;

                // fetch courses for each semester
                // there are 9 semesters as fixed values
                for($i=1; $i<=9; $i+=1) {
                    $temp = array();
                    $result = $conn->query("SELECT course_id FROM course_semester WHERE semester_id='$i'");
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()) {
                            array_push($temp,$row["course_id"]);
                        }
                    }
                    $courses[$i-1] = $temp;
                }

                // fetch question groups
                $result = $conn->query("SELECT * FROM qgroup");
                while($row = $result->fetch_assoc()){
                    array_push($qgroups,$row["qgroup"]);
                    array_push($qgroups_id,$row["qgroup_id"]);
                }

                // fetch questions
                for($i=0; $i<count($qgroups_id); $i+=1) {
                    $temp = array();
                    $result = $conn->query("SELECT question FROM question WHERE qgroup_id = $qgroups_id[$i]");
                    while($row = $result->fetch_assoc()) {
                        array_push($temp,$row["question"]);
                    }
                    array_push($questions, $temp);
                }

                require "./public/views/form.php";
                $conn->close();
            } catch(Exception $e) {
                echo $e->getMessage();
            }
            exit;
        } else {
            header("Location: /");
            exit;
        }
    }

    function renderLogin() {
        if($_SESSION["logged"]) {
            header("Location: /admin");
            exit;
        } else if($_SESSION["student_logged"]) { 
            header("Location: /form");
            exit;
        } else {
            require "./public/views/login.php";
            exit;
        }
    }

    function renderAdmin() {
        if($_SESSION["logged"]) {
            require "./public/views/dashboard.php";
            exit;
        } else if($_SESSION["student_logged"]) {
            http_response_code(403);
        } else {
            header("Location: /");
            exit;
        }
    }

    function renderSearch() {
        if($_SESSION["logged"]) {
            require "./public/views/search.php";
            exit;
        } else if($_SESSION["student_logged"]) {
            http_response_code(403);
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
        } else if($_SESSION["student_logged"]) {
            http_response_code(403);
        } else {
            header("Location: /admin");
            exit;
        }
    }

    function renderDetails() {
        if($_SESSION["logged"]) {
            $details = $_SESSION["detailsData"];
            $comment = $_SESSION["commentData"];
            require "./public/views/details.php";
            exit;
        } else if($_SESSION["student_logged"]) {
            http_response_code(403);
        } else {
            header("Location: /admin");
            exit;
        }
    }

    function renderCreate() {
        if($_SESSION["logged"]) {
            $servername = DB_HOST;
            $database   = DB_NAME;

            try {
                $conn = new mysqli($servername,$_SESSION["username"],$_SESSION["password"],$database);
                if($conn->connect_error) {
                    die("Connection Failed");
                }
            } catch(Exception $e) {
                echo $e->getMessage();
            }

            // get courses for suggestion
            $course = fetchCourse($conn,null);

            // get faculties for suggestion
            $faculty = fetchFaculty($conn);

            // get instructor data for suggestion
            $instructor = fetchInstructorData($conn);
            
            $conn->close();
            require "./public/views/create.php";
            exit;
        } else if($_SESSION["student_logged"]) {
            http_response_code(403);
        } else {
            header("Location: /admin");
            exit;
        }
    }

    function renderUpdate() {
        if($_SESSION["logged"]) {
            $servername = DB_HOST;
            $database   = DB_NAME;

            try {
                $conn = new mysqli($servername,$_SESSION["username"],$_SESSION["password"],$database);
                if($conn->connect_error) {
                    die("Connection Failed");
                }
            } catch(Exception $e) {
                echo $e->getMessage();
            }

            // get retrieved data 
            $data = $_SESSION["updateData"];

            // get courses for suggestion
            $course = fetchCourse($conn,$data["faculty_id"]);

            // get faculties for suggestion
            $faculty = fetchFaculty($conn);

            // get instructor data for suggestion
            $instructor = fetchInstructorData($conn);

            $conn->close();
            require "./public/views/update.php";
            exit;
        } else if($_SESSION["student_logged"]) {
            http_response_code(403);
        } else {
            header("Location: /admin");
            exit;
        }
    }

    //////////////////// Fetch Functions ///////////////////////////

    // fetch id and name for each faculties 
    function fetchFaculty($conn) {
        try {
            $result = $conn->query("SELECT faculty_id, faculty_name FROM faculty ORDER BY faculty_name DESC");
            $faculty = array();
            while($row = $result->fetch_assoc()) {
                $temp = array();
                $temp["faculty_id"]   = $row["faculty_id"];
                $temp["faculty_name"] = $row["faculty_name"];
                array_push($faculty,$temp);
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return $faculty;
    }

    // fetch all the courses 
    function fetchCourse($conn, $faculty_id) {
        try {
            if($faculty_id == null) {
                $result = $conn->query("SELECT course_id FROM course");
            } else {
                $result = $conn->query("SELECT course_id FROM course WHERE course.faculty_id = '$faculty_id'");
            }
            $course = array();
            while($row = $result->fetch_assoc()) {
                array_push($course,$row["course_id"]);
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return $course;
    }

     // fetch all the courses 
     /*
     function fetchCourse($conn) {
        try {
            $result = $conn->query("SELECT course_id FROM course");
            $course = array();
            while($row = $result->fetch_assoc()) {
                array_push($course,$row["course_id"]);
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return $course;
    }
    */

    // fetch instructor name, email and faculty id for each instructor
    function fetchInstructorData($conn) {
        try{
            $result = $conn->query("SELECT instructor_name, email, faculty_id FROM instructor");
            $instructor = array();
            while($row = $result->fetch_assoc()) {
                $temp = array();
                $temp["instructorName"] = $row["instructor_name"];
                $temp["email"]          = $row["email"];
                $temp["faculty_id"]     = $row["faculty_id"];
                array_push($instructor,$temp);
            } 
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return $instructor;
    }

?>