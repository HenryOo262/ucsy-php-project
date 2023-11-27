<?php

    require_once "../config.php";

    // Variables for database connection
    $servername = DB_HOST;
    $database   = DB_NAME;
    $username   = STUDENT;
    $password   = STUDENT_PASS;

    try {
        // Database connection
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection Failed");
        }

        // Form data
        $instructor   = $conn->real_escape_string($_POST["instructorName"]);
        $academicYear = $conn->real_escape_string($_POST["academicYear"]);
        $semester     = $conn->real_escape_string($_POST["semester"]);
        $course       = $conn->real_escape_string($_POST["course"]);
        $comment      = trim($conn->real_escape_string($_POST["comment"]));

        // Question count
        $count = ($conn->query("SELECT * FROM question"))->num_rows;

        // Array to store question responses
        $arr = array();

        // Collect question responses
        for ($i = 0; $i < $count; $i += 1) {
            $arr[$i] = $_POST[$i + 1];
        }

        // Teaches row ID
        $teachesID = null;

        // Check if the instructor-teaches-course record exists in the teaches table
        $selectTeachesQuery = "
            SELECT teaches_id
            FROM teaches
            WHERE academicYear = ? AND semester_id = ? AND course_id = ?
        ";

        $stmtTeaches = $conn->prepare($selectTeachesQuery);
        $stmtTeaches->bind_param("sss", $academicYear, $semester, $course);
        $stmtTeaches->execute();
        $resultTeaches = $stmtTeaches->get_result();

        // Check if record exists in teaches table
        if ($resultTeaches->num_rows == 0) {
            // Admin must update the teaches table prior to students' evaluation
            // If the record doesn't exist, handle the error as needed
            die("ERROR - Admin hasn't updated.");
        } else {
            // If exists, get teachesID
            $row = $resultTeaches->fetch_assoc();
            $teachesID = $row["teaches_id"];
        }

        // If point rows for that teachesID don't exist, create them
        $selectPointQuery = "SELECT * FROM point WHERE teaches_id = ?";
        $stmtPoint = $conn->prepare($selectPointQuery);
        $stmtPoint->bind_param("i", $teachesID);
        $stmtPoint->execute();
        $resultPoint = $stmtPoint->get_result();

        // Create new rows in the point table
        $insertPointQuery = "INSERT INTO point (teaches_id, question_id) VALUES (?, ?)";

        if ($resultPoint->num_rows == 0) {
            for ($i = 1; $i <= $count; $i += 1) {
                $stmtInsertPoint = $conn->prepare($insertPointQuery);
                $stmtInsertPoint->bind_param("ii", $teachesID, $i);
                $stmtInsertPoint->execute();
            }
        }

        // After that, update them
        for ($i = 1; $i <= $count; $i += 1) {
            switch ($arr[$i - 1]) {
                case 1:
                    $updateQuery = "UPDATE point SET totally_disagree = totally_disagree + 1 WHERE teaches_id = ? AND question_id = ?";
                    break;

                case 2:
                    $updateQuery = "UPDATE point SET disagree = disagree + 1 WHERE teaches_id = ? AND question_id = ?";
                    break;

                case 3:
                    $updateQuery = "UPDATE point SET neutral = neutral + 1 WHERE teaches_id = ? AND question_id = ?";
                    break;

                case 4:
                    $updateQuery = "UPDATE point SET agree = agree + 1 WHERE teaches_id = ? AND question_id = ?";
                    break;

                case 5:
                    $updateQuery = "UPDATE point SET totally_agree = totally_agree + 1 WHERE teaches_id = ? AND question_id = ?";
                    break;
            }

            $stmtUpdatePoint = $conn->prepare($updateQuery);
            $stmtUpdatePoint->bind_param("ii", $teachesID, $i);
            $stmtUpdatePoint->execute();
        }

        // Insert comment if not empty
        if (!empty($comment)) {
            $insertCommentQuery = "INSERT INTO comment(teaches_id, comment) VALUES (?, ?)";
            $stmtInsertComment = $conn->prepare($insertCommentQuery);
            $stmtInsertComment->bind_param("is", $teachesID, $comment);
            $stmtInsertComment->execute();
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }

    // Close connection
    $conn->close();

    header("Location: /next");
    exit;

?>
