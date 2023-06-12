<?php

if (empty($_POST["username"])) {
    die("username is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}


$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
 // <!-- FIXME: -->
$mysqli = require __DIR__ . "/LoginDB.php";

$sql = "INSERT INTO user (username, email, password_hash,cooperation) VALUES (?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                  $_POST["username"],
                  $_POST["email"],
                  $password_hash,
                  $_POST["cooperation"]);
                  
if ($stmt->execute()) {
    // <!-- FIXME: -->
    header("Location: Successful_Registration.php");
    exit;
    
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

