<?php

    session_start();

    require_once "../config.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $servername = DB_HOST;
    $database = DB_NAME;

    // establish connection to verify admin login
    $check = new mysqli($servername, "validator", "validator2023", $database);

    if ($check->connect_error) {
        die("Connection Failed");
    }

    // check if admin login username exists in admin table using prepared statement
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = $check->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    try {
        if ($result->num_rows > 0) {
            // if username is found
            $row = $result->fetch_assoc();
            $hashedpassword = $row["password"];
            // compare login password and stored password of that admin
            if (password_verify($password, $hashedpassword)) {
                // keep username and password in session for further use
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = $_POST["password"];
                $_SESSION["loginFail"] = false;
                header("Location: /admin");
            } else {
                $_SESSION["loginFail"] = true;
                header("Location: /admin");
                exit;
            }
        } else {
            // if username is not in admin table
            $_SESSION["loginFail"] = true;
            header("Location: /admin");
            exit;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    $_SESSION["logged"] = true;
?>