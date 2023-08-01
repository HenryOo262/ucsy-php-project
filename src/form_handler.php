 <?php

    require_once '../config.php';

    // form data
    $instructorName = $_POST["instructorName"];
    $academicYear   = $_POST["academicYear"];
    $classroom      = $_POST["classroom"];
    $semester       = $_POST["semester"];

    for($i = 0; $i <= 15; $i += 1) {
        $arr[$i] = $_POST[$i+1];
    }

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

    // processes form data
    $instructorName = $conn->real_escape_string($instructorName);
    $academicYear   = $conn->real_escape_string($academicYear);
    $classroom      = $conn->real_escape_string($classroom);

    //prepare and bind
    $prepare = $conn->prepare("");
    
    // close connection
    $conn->close();

 ?>