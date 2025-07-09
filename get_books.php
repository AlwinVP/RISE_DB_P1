<?php
$conn = new mysqli("localhost", "root", "", "library_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM Books");
$books = [];
while($row = $result->fetch_assoc()) {
  $books[] = $row;
}
header('Content-Type: application/json');
echo json_encode($books);
$conn->close();
?>
