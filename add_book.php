<?php
$conn = new mysqli("localhost", "root", "", "library_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

$stmt = $conn->prepare("INSERT INTO Books (title, author, publisher, year_published, isbn, copies_available) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssisi", $data->title, $data->author, $data->publisher, $data->year, $data->isbn, $data->copies);
$stmt->execute();

echo json_encode(["status" => "success"]);
$conn->close();
?>
