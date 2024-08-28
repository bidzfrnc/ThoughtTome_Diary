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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (same code as before)

    $profile_image = $_POST['profile_image'];

    if (empty($diary_title) || empty($category) || empty($diary_content) || empty($date_upload) || empty($uploader_username)) {
        echo "All fields are required.";
    } else {
        $sql = "INSERT INTO diary_tbl (diary_title, category, diary_content, date_upload, uploader_username, profile_image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssss", $diary_title, $category, $diary_content, $date_upload, $uploader_username, $profile_image);

            if ($stmt->execute()) {
                echo '<script type="text/javascript">
                alert("New Diary Added!");
                window.location.href = "home-page.php";
                </script>';
            } else {
                echo "Error inserting data: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $conn->error;
        }
    }
}

$conn->close();
?>
