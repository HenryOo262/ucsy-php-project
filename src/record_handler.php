<?php

    session_start();

    require_once "../config.php";

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

    // DBMS operations on Teaches Table
    if(isset($_GET["submit_button"])) {
        // for GET requests
        if($_GET["submit_button"] == "search") {
            search();
        } else if($_GET["submit_button"] == "update") {
            update();
        } else if($_GET["submit_button"] == "details") {
            details();
        }
    } else {
        // for POST requests
        if($_POST["submit_button"] == "create") {
            create();
        } else if($_POST["submit_button"] == "save") {
            save();
        }
    }

    $conn->close();


    // create records
    function create() {
        global $conn;
        $instructor   = $conn->real_escape_string($_POST["instructorName"]);
        $email        = $conn->real_escape_string($_POST["email"]);
        $faculty      = $conn->real_escape_string($_POST["faculty"]);
        $academicYear = $conn->real_escape_string($_POST["academicYear"]);
        $semester     = $conn->real_escape_string($_POST["semester"]);
        $course       = $conn->real_escape_string($_POST["course"]);
    
        matchCourseSemesterFaculty($conn,$course,$semester,$faculty);

        $instructorID = checkInstructor($conn,$instructor,$email,$faculty);
    
        try {
            $query = "INSERT INTO teaches(instructor_id,academicYear,course_id,semester_id) VALUES ($instructorID,'$academicYear','$course',$semester)";
            $conn->query($query);
        } catch(Exception $e) {
            echo $e->getMessage();
        }

        header("Location: /admin/create");
    }

    // save updated records 
    function save() {
        global $conn;
        $instructor   = $conn->real_escape_string($_POST["instructorName"]);
        $email        = $conn->real_escape_string($_POST["email"]);
        $academicYear = $conn->real_escape_string($_POST["academicYear"]);
        $semester     = $conn->real_escape_string($_POST["semester"]);
        $faculty      = $conn->real_escape_string($_POST["faculty"]);
        $course       = $conn->real_escape_string($_POST["course"]);
        $teachesID    = $conn->real_escape_string($_POST["teachesID"]);

        matchCourseSemesterFaculty($conn,$course,$semester,$faculty);

        $instructorID = checkInstructor($conn,$instructor,$email,$faculty);
        
        try {
            $query = "
                UPDATE teaches 
                SET academicYear='$academicYear', semester_id='$semester', course_id='$course', instructor_id = $instructorID
                WHERE teaches_id='$teachesID'
            ";
            $conn->query($query);
        } catch(Exception $e) {
            echo $e->getMessage();
        }

        header("Location: /admin/search");
    }

    // check if course and semester matches
    function matchCourseSemesterFaculty($conn,$course,$semester,$faculty) {
        try {
            $query = "SELECT * FROM course_semester JOIN course ON course.course_id = course_semester.course_id WHERE course_semester.course_id='$course' AND semester_id=$semester";
            $result = $conn->query($query);
            if($result->num_rows == 0) {
                die("Error: Subject and Semester mismatch. Please recheck your input values");
            } else {
                $row = $result->fetch_assoc();
                if($row["faculty_id"] != $faculty) {
                    die("Error: Instructor Faculty and Subject Faculty mismatch. Please recheck your input values");
                }
            } 
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    // check if instructor exists, if exists return their ID
    function checkInstructor($conn,$instructor,$email,$faculty) {
        try {
            $query = "SELECT instructor_id FROM instructor WHERE instructor_name='$instructor' AND email='$email' AND faculty_id='$faculty'";
            $result = $conn->query($query);
            if($result->num_rows == 0) {
                die("Error: The specified instructor does not exist. Please recheck your input values.");
            } else {
                $row = $result->fetch_assoc();
                $instructorID = $row["instructor_id"];
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return $instructorID;
    }

    // update records 
    function update() {
        global $conn;
        $teachesID = $conn->real_escape_string($_GET["teachesID"]);
        try {
            $query = "
                SELECT * 
                FROM teaches JOIN instructor JOIN faculty
                ON teaches.instructor_id = instructor.instructor_id 
                AND instructor.faculty_id = faculty.faculty_id
                WHERE teaches_id='$teachesID'
            ";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();

            // associative array
            $data = array();

            // assign values to associative array
            $data["instructorName"] = $row["instructor_name"];
            $data["email"]          = $row["email"];
            $data["faculty"]        = $row["faculty_name"];
            $data["academicYear"]   = $row["academicYear"];
            $data["course"]         = $row["course_id"];
            $data["semester"]       = $row["semester_id"];
            $data["teachesID"]      = $teachesID;

            $_SESSION["updateData"] = $data;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        header("Location: /admin/search/update");
    }
    
    // search records
    function search() {
        global $conn;
        $semester = $conn->real_escape_string($_GET["semester"]);
        $academicYear = $conn->real_escape_string($_GET["academicYear"]);
        try {
            $query = "
                SELECT * 
                FROM teaches JOIN instructor JOIN faculty 
                ON teaches.instructor_id = instructor.instructor_id 
                AND instructor.faculty_id = faculty.faculty_id 
            ";

            if(!empty($_GET["semester"]) && empty($_GET["academicYear"])) {
                $query .= " WHERE semester_id=$semester";
            } else if(!empty($_GET["academicYear"]) && empty($_GET["semester"])) {
                $query .= " WHERE academicYear='$academicYear'";
            } else if(!empty($_GET["academicYear"]) && !empty($_GET["semester"])) {
                $query .= " WHERE academicYear='$academicYear' AND semester_id=$semester";
            }

            // execute query
            $result = $conn->query($query);
        
            // associative array
            $data = array();

            while($row = $result->fetch_assoc()) {
                $temp = array();
                $temp["teachesID"]      = $row["teaches_id"];
                $temp["instructorName"] = $row["instructor_name"];
                $temp["email"]          = $row["email"];
                $temp["faculty"]        = $row["faculty_name"];
                $temp["academicYear"]   = $row["academicYear"];
                $temp["semester"]       = $row["semester_id"];
                $temp["course"]         = $row["course_id"];
                array_push($data,$temp);
            }

            $_SESSION["searchData"] = $data;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        header("Location: /admin/search/show");
    }

    // extract details of the searched record
    function details() {
        global $conn;

        try {
            // fetch evaluation points for that teaches record
            $query = "SELECT * FROM point NATURAL JOIN question WHERE teaches_id = " . $_GET["teachesID"];
            $result = $conn->query($query);
            $details = array();
            while($row = $result->fetch_assoc()) {
                $temp = array();
                array_push($temp, $row['question']);
                array_push($temp, $row['totally_disagree']);
                array_push($temp, $row['disagree']);
                array_push($temp, $row['neutral']);
                array_push($temp, $row['agree']);
                array_push($temp, $row['totally_agree']);
                array_push($details, $temp);
            }

            // fetch comments for that record
            $query = "SELECT * FROM comment WHERE teaches_id = " . $_GET["teachesID"];
            $result = $conn->query($query);
            $comment = array();
            while($row = $result->fetch_assoc()) {
                array_push($comment, $row["comment"]);
            }

            $_SESSION["detailsData"] = $details;
            $_SESSION["commentData"] = $comment;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        header("Location: /admin/search/show/details");
    }
 
?>