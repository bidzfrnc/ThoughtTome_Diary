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
    $diary_title = $_POST["diary_title"];
    $diary_content = $_POST["diary_content"];
    $date_upload = date('Y-m-d', strtotime($_POST["date_upload"]));
    $uploader_username = $_POST['uploader_username'];
    $profile_image = $_POST['profile_image'];

    // Check if the category is "Others"
    if ($_POST["category"] === "Others") {
        $category = $_POST["custom_category"];  // Use the custom category input
    } else {
        $category = $_POST["category"];  // Use the selected category from the dropdown
    }

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
