<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $offer_title = sanitize_input($_POST["offer_title"]);
    $file_path = sanitize_input($_POST["file_path"]);
    $duration = sanitize_input($_POST["duration"]);
    $offer_description = sanitize_input($_POST["offer_description"]);
    $skill1 = sanitize_input($_POST["skill1"]);
    $skill2 = sanitize_input($_POST["skill2"]);
    $skill3 = sanitize_input($_POST["skill3"]);
    $location = sanitize_input($_POST["location"]);
    $offer_email = sanitize_input($_POST["offer_email"]);
    $offer_contact = sanitize_input($_POST["offer_contact"]);
    $salary = sanitize_input($_POST["salary"]);


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jobify";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM offers WHERE offer_title=?");
    $stmt->bind_param("s",$offer_title);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Duplicate entry found. Offer not created.";
    } else {
        $stmt = $conn->prepare("INSERT INTO offers (offer_title, file_path, duration, offer_description,
         skill1, skill2, skill3, locat, offer_email, offer_contact, salary) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssss",$offer_title, $file_path, $duration, $offer_description,
        $skill1, $skill2, $skill3, $location, $offer_email, $offer_contact, $salary);
        $stmt->execute();
    }

    // echo "New offer created successfully";

    $stmt->close();
    $conn->close();
}

function sanitize_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


