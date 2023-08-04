 <?php

    require_once '../config.php';
    
    // variables for db connection
    $servername  = DB_HOST;
    $database    = DB_NAME;
    $username    = "root";
    $password    = "root";

    // db connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    if($conn->connect_error){
        die("Connection Failed");
    }

    // form data
    $instructor     = $_POST["instructorName"];
    $academicYear   = $_POST["academicYear"];
    $semester       = $_POST["semester"];
    $course         = $_POST["course$semester"];

    // question count 
    $count = 16;
 
    // 16 questions
    for($i = 0; $i < $count; $i += 1) {
        $arr[$i] = $_POST[$i+1];
    }

    // processes form data
    $instructor     = $conn->real_escape_string($instructor);
    $academicYear   = $conn->real_escape_string($academicYear);
    $course         = $conn->real_escape_string($course);

    // prepare - insert statement
    $insertTeaches = $conn->prepare("INSERT INTO teaches (instructor,academicYear,course) VALUES (?,?,?)");
    $insertPoint   = $conn->prepare("INSERT INTO point (teaches, question) VALUES (?,?)");

    // prepare and bind and execute - select statement
    $selectTeaches = $conn->prepare("SELECT teaches.ID as teaches_id, instructor, academicYear, course, course.ID as course_id, name, semester FROM teaches JOIN course ON teaches.course = course.ID WHERE instructor = ? AND academicYear = ? and course.ID = ?");
    $selectTeaches->bind_param("sss", $instructor, $academicYear, $course);
    $selectTeaches->execute();
    $resultTeaches = $selectTeaches->get_result();

    // teaches row ID 
    $teachesID = null;
    
    // if row for teaches doesn't exist
    if($resultTeaches->num_rows == 0){
        $insertTeaches->bind_param("sss", $instructor, $academicYear, $course);
        $insertTeaches->execute();
    }

    // to get the ID column of teaches
    $selectTeaches->execute();
    $resultTeaches = $selectTeaches->get_result();
    $row = $resultTeaches->fetch_assoc();
    $teachesID = $row["teaches_id"];
    
    // if point rows for that teachesID doesn't exist, create them
    $selectPoint = $conn->prepare("SELECT * FROM point WHERE teaches = ?");
    $selectPoint->bind_param("i",$teachesID);
    $selectPoint->execute();
    $resultPoint = $selectPoint->get_result();

    if($resultPoint->num_rows == 0){
        for($i=1; $i<=$count; $i+=1){
            $insertPoint->bind_param("ii", $teachesID, $i);
            $insertPoint->execute();
        }
    }
    
    // update them 
    $updateTotallyDisagree = $conn->prepare("UPDATE point SET totally_disagree = totally_disagree + 1 WHERE teaches = ? AND question = ?");
    $updateDisagree = $conn->prepare("UPDATE point SET disagree = disagree + 1 WHERE teaches = ? AND question = ?");
    $updateNeutral = $conn->prepare("UPDATE point SET neutral = neutral + 1 WHERE teaches = ? AND question = ?");
    $updateAgree = $conn->prepare("UPDATE point SET agree = agree + 1 WHERE teaches = ? AND question = ?");
    $updateTotallyAgree = $conn->prepare("UPDATE point SET totally_agree = totally_agree + 1 WHERE teaches = ? AND question = ?");

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