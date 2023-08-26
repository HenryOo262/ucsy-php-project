 <?php

    require_once "../config.php";
    
    // variables for db connection
    $servername  = DB_HOST;
    $database    = DB_NAME;
    $username    = "root";
    $password    = "root";

    // db connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    if($conn->connect_error) {
        die("Connection Failed");
    }

    // form data
    $instructor     = $_POST["instructorName"];
    $academicYear   = $_POST["academicYear"];
    $semester       = $_POST["semester"];
    $course         = $_POST["course$semester"];
    $comment        = $_POST["comment"];

    // question count
    $count = ($conn->query("SELECT * FROM question"))->num_rows;
 
    // 16 questions
    for($i = 0; $i < $count; $i += 1) {
        $arr[$i] = $_POST[$i+1];
    }

    // teaches row ID 
    $teachesID = null;

    // create new rows in point table if rows do not exist
    $insertPoint   = $conn->prepare("INSERT INTO point (teaches_id, question_id) VALUES (?,?)");

    // check if the instructor-teaches-course record exists in teaches table
    // WHERE CLAUSE ->
    // line 1 - instructor_name = <input>
    // line 2 - join with instructor table
    // line 3 - academicYear = <input>
    // line 4 - course_id = <input>
    // line 5 - join with course table 
    // line 6 - to make sure instructor and course faculty are the same 
    // because instructors with the same name could exist in other faculties
    // problems could arise if two instructors with the same name exist in the same faculty
    // the form input needs more data (instructor email, or ID like YKPT to solve the problem)  
    $selectTeaches = $conn->prepare(
        "SELECT *
        FROM teaches JOIN instructor JOIN course
        WHERE instructor.instructor_name = ? AND 
        teaches.instructor_id = instructor.instructor_id AND    
        teaches.academicYear = ? AND 
        teaches.course_id = ? AND 
        course.course_id = teaches.course_id AND 
        course.faculty_id = instructor.faculty_id" 
    );
    $selectTeaches->bind_param("sss", $instructor, $academicYear, $course);
    $selectTeaches->execute();
    $resultTeaches = $selectTeaches->get_result();
    
    // check if record exist in teaches table
    if($resultTeaches->num_rows == 0) {
        // ADMIN MUST UPDATE THE TEACHES TABLE PRIOR TO STUDENTS' EVALUATION
        // if record doesn't exist
        die("ERROR - admin hasn't updated or subject and instructor mismatch.");
    }
    else {
        // if exists - get teachesID
        $selectTeaches->execute();
        $resultTeaches = $selectTeaches->get_result();
        $row = $resultTeaches->fetch_assoc();
        $teachesID = $row["teaches_id"];
    }
    
    // if point rows for that teachesID doesn't exist, create them
    $selectPoint = $conn->prepare("SELECT * FROM point WHERE teaches_id = ?");
    $selectPoint->bind_param("i",$teachesID);
    $selectPoint->execute();
    $resultPoint = $selectPoint->get_result();

    if($resultPoint->num_rows == 0) {
        for($i=1; $i<=$count; $i+=1) {
            $insertPoint->bind_param("ii", $teachesID, $i);
            $insertPoint->execute();
        }
    }
    
    // if exists or created - update them 
    $updateTotallyDisagree = $conn->prepare("UPDATE point SET totally_disagree = totally_disagree + 1 WHERE teaches_id = ? AND question_id = ?");
    $updateDisagree = $conn->prepare("UPDATE point SET disagree = disagree + 1 WHERE teaches_id = ? AND question_id = ?");
    $updateNeutral = $conn->prepare("UPDATE point SET neutral = neutral + 1 WHERE teaches_id = ? AND question_id = ?");
    $updateAgree = $conn->prepare("UPDATE point SET agree = agree + 1 WHERE teaches_id = ? AND question_id = ?");
    $updateTotallyAgree = $conn->prepare("UPDATE point SET totally_agree = totally_agree + 1 WHERE teaches_id = ? AND question_id = ?");

    for ($i=1; $i<=$count; $i+=1) {
        switch ($arr[$i-1]) {
            case 1:
                $updateTotallyDisagree->bind_param("ii", $teachesID, $i);
                $updateTotallyDisagree->execute();
                break;

            case 2:
                $updateDisagree->bind_param("ii", $teachesID, $i);
                $updateDisagree->execute();
                break;

            case 3:
                $updateNeutral->bind_param("ii", $teachesID, $i);
                $updateNeutral->execute();
                break;

            case 4:
                $updateAgree->bind_param("ii", $teachesID, $i);
                $updateAgree->execute();
                break;

            case 5:
                $updateTotallyAgree->bind_param("ii", $teachesID, $i);
                $updateTotallyAgree->execute();
                break;
        }
    }
    
    // close connection
    $conn->close();

 ?>