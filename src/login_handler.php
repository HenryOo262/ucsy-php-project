<?php

    session_start();

    require_once "../config.php";

    if($_POST["logButton"] == "login") {
        login();
    }else if($_POST["logButton"] == "logout") {
        logout();
    }

    function logout() {
        $_SESSION["logged"] = false;
        $_SESSION["student_logged"] = false;
        $_SESSION["username"] = null;
        $_SESSION["password"] = null;

        header("Location: /");
        exit;
    }

    function login() {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $servername = DB_HOST;
        $database = DB_NAME;

        // establish connection to verify admin login
        $check = new mysqli($servername, "validator", "validator2023", $database);

        if ($check->connect_error) {
            die("Connection Failed");
        }

        // check if login username exists in user table using prepared statement
        $query = "SELECT * FROM user WHERE username = ?";
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
                // get role of user who logs in
                $role = $row["role"];
                // compare login password and stored password of that admin
                if (password_verify($password, $hashedpassword)) {
                    $_SESSION["loginFail"] = false;
                    // check roles of users who logs in
                    if($role == "admin") {
                        // if the user role is admin
                        // keep username and password in session for further use
                        $_SESSION["username"] = $_POST["username"];
                        $_SESSION["password"] = $_POST["password"];
                        $_SESSION["logged"] = true;
                        header("Location: /admin");
                    } else if($role == "student") {
                        // if the user role is student
                        $_SESSION["student_logged"] = true;
                        header("Location: /form");
                    }
                } else {
                    $_SESSION["loginFail"] = true;
                    header("Location: /");
                    exit;
                }
            } else {
                // if username is not in user table, login will fail
                $_SESSION["loginFail"] = true;
                header("Location: /");
                exit;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
?>