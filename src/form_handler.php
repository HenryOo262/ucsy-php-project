 <?php

    // form data
    $instructorName = $_POST["instructorName"];
    $academicYear   = $_POST["academicYear"];
    $classroom      = $_POST["classroom"];
    $semester       = $_POST["semester"];

    for($i = 0; $i <= 15; $i += 1) {
        $arr[$i] = $_POST[$i+1];
    }

    // variables for db connection
    $servername  = getenv("DB_HOST");
    $database    = getenv("DB_NAME");
    $username    = "root";
    $password    = "root";

    // database connection 
    try{
        $conn = new mysqli($servername, $username, $password, $database);
    }catch(Exception $e){
        echo $e;
        exit;
    }

    // processes form data
    $instructorName = $conn->real_escape_string($instructorName);
    $academicYear   = $conn->real_escape_string($academicYear);
    $classroom      = $conn->real_escape_string($classroom);

    $query = "SELECT * FROM points 
    WHERE instructor = '$instructorName' AND academic_year = '$academicYear' 
    AND semester = $semester AND classroom = '$classroom'";

    $result = $conn->query($query);

    if($result->num_rows > 0){
        echo "exists";
    }else{
        echo "doesn't exist";
    }

    // close connection
    $conn->close();

 ?>