<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signupacc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE gallery_items (
    upload_id INT AUTO_INCREMENT PRIMARY KEY,
    uploader_username VARCHAR(255) NOT NULL,
    image BLOB,
    description TEXT NOT NULL,
    music_one LONGBLOB,
    music_two LONGBLOB,
    music_three LONGBLOB,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

if ($conn->query($sql) === TRUE) {
    echo "Table gallery_items created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
