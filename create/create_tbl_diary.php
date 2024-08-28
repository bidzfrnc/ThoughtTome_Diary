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

$sql = "CREATE TABLE diary_tbl (
    diary_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    diary_title VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    diary_content TEXT NOT NULL,
    date_upload DATE,
    uploader_username VARCHAR(50) NOT NULL,
    profile_image BLOB
)";

if ($conn->query($sql) === TRUE) {
    echo "Table diary_tbl created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
