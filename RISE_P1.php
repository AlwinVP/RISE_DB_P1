<?php
$mysqli = new mysqli("localhost", "root", "", "library_db");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$result = $mysqli->query("SELECT * FROM Books");
echo "<h1>Library Books</h1><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>{$row['title']} by {$row['author']} (Available: {$row['copies_available']})</li>";
}
echo "</ul>";
$mysqli->close();
?>
