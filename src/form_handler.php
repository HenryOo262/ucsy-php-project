 <?php

    require_once "../config.php";

    // variables for db connection
    $servername = DB_HOST;
    $database = DB_NAME;
    $username = "student";
    $password = "stud2022";

    // db connection
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection Failed");
    }

    // form data
    $instructor   = mysqli_real_escape_string($conn, $_POST["instructorName"]);
    $academicYear = mysqli_real_escape_string($conn, $_POST["academicYear"]);
    $semester     = mysqli_real_escape_string($conn, $_POST["semester"]);
    $course       = mysqli_real_escape_string($conn, $_POST["course$semester"]);
    $comment      = mysqli_real_escape_string($conn, $_POST["comment"]);

    // question count
    $count = ($conn->query("SELECT * FROM question"))->num_rows;

    // 16 questions
    for ($i = 0; $i < $count; $i += 1) {
        $arr[$i] = $_POST[$i + 1];
    }

    // teaches row ID
    $teachesID = null;

    // create new rows in point table if rows do not exist
    $insertPointQuery = "INSERT INTO point (teaches_id, question_id) VALUES ";

    // check if the instructor-teaches-course record exists in teaches table
    $selectTeachesQuery = "
        SELECT *
        FROM teaches JOIN instructor JOIN course
        WHERE instructor.instructor_name = '$instructor' 
        AND teaches.instructor_id = instructor.instructor_id 
        AND teaches.academicYear = '$academicYear' 
        AND teaches.course_id = '$course' 
        AND teaches.semester_id = '$semester'
        AND course.course_id = teaches.course_id 
        AND course.faculty_id = instructor.faculty_id
    ";
    $resultTeaches = $conn->query($selectTeachesQuery);

    // check if record exists in teaches table
    if ($resultTeaches->num_rows == 0) {
        // ADMIN MUST UPDATE THE TEACHES TABLE PRIOR TO STUDENTS' EVALUATION
        // if record doesn't exist
        die("ERROR - admin hasn't updated or subject and instructor mismatch.");
    } else {
        // if exists - get teachesID
        $row = $resultTeaches->fetch_assoc();
        $teachesID = $row["teaches_id"];
    }

    // if point rows for that teachesID don't exist, create them
    $selectPointQuery = "SELECT * FROM point WHERE teaches_id = '$teachesID'";
    $resultPoint = $conn->query($selectPointQuery);

    if ($resultPoint->num_rows == 0) {
        for ($i = 1; $i <= $count; $i += 1) {
            $insertPointQuery .= "('$teachesID', '$i'),";
        }
        $insertPointQuery = rtrim($insertPointQuery, ',');
        $conn->query($insertPointQuery);
    }

    // if exists or created - update them
    for ($i = 1; $i <= $count; $i += 1) {
        switch ($arr[$i - 1]) {
            case 1:
                $updateQuery = "UPDATE point SET totally_disagree = totally_disagree + 1 WHERE teaches_id = '$teachesID' AND question_id = '$i'";
                break;

            case 2:
                $updateQuery = "UPDATE point SET disagree = disagree + 1 WHERE teaches_id = '$teachesID' AND question_id = '$i'";
                break;

            case 3:
                $updateQuery = "UPDATE point SET neutral = neutral + 1 WHERE teaches_id = '$teachesID' AND question_id = '$i'";
                break;

            case 4:
                $updateQuery = "UPDATE point SET agree = agree + 1 WHERE teaches_id = '$teachesID' AND question_id = '$i'";
                break;

            case 5:
                $updateQuery = "UPDATE point SET totally_agree = totally_agree + 1 WHERE teaches_id = '$teachesID' AND question_id = '$i'";
                break;
        }
        $conn->query($updateQuery);
    }

    // insert comment
    $insertCommentQuery = "INSERT INTO comment(teaches_id,comment) VALUES ($teachesID,'$comment')";
    $conn->query($insertCommentQuery);

    // close connection
    $conn->close();

    header("Location: /");
    exit;
 ?>