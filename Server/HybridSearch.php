<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobify";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "getting the SearchQuery";
if (isset($_GET['q'])) {

    $searchQuery = filter_var($_GET['q'], FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("SELECT id, offer_title, file_path, duration, offer_description,
    skill1, skill2, skill3, locat, offer_email, offer_contact, salary FROM offers WHERE offer_title LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("s", $searchQuery);
} else {

    $stmt = $conn->prepare("SELECT id, offer_title, file_path, duration, offer_description,
    skill1, skill2, skill3, locat, offer_email, offer_contact, salary FROM offers");
}
$stmt->execute();
// echo "Executing...";
$stmt->bind_result($id ,$offer_title, $file_path, $duration, $offer_description,
$skill1, $skill2, $skill3, $location, $offer_email, $offer_contact, $salary);

// echo "Fetching...";
$jobs = array();
while ($stmt->fetch()) {
    $jobs[] = array("id" => $id,"offer_title" => $offer_title,"file_path" => $file_path,"duration" => $duration,"offer_description" => $offer_description,
    "skill1" => $skill1,"skill2" => $skill2,"skill3" => $skill3,"location" => $location,"offer_email" => $offer_email,"offer_contact" => $offer_contact,
    "salary" => $salary);
}
// echo "Done Fetching...";

$stmt->close();
$conn->close();

// echo "done.";

$jobs_json = json_encode($jobs);
file_put_contents('./JSON/jobs.json', $jobs_json);
include('parseData.php');
?>