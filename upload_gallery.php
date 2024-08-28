
<?php
session_start();

if (isset($_SESSION['username'])) {
    $uploaderUsername = $_SESSION['username'];

    // File upload handling
    $imageFolder = "uploads/images/"; // Folder to store uploaded images
    $musicFolder = "uploads/music/"; // Folder to store uploaded music files

    // Handle image upload
    $imagePath = $imageFolder . basename($_FILES["images_gallery"]["name"]);
    move_uploaded_file($_FILES["images_gallery"]["tmp_name"], $imagePath);

    // Handle music file uploads
    $music1Path = $musicFolder . basename($_FILES["music1"]["name"]);
    move_uploaded_file($_FILES["music1"]["tmp_name"], $music1Path);
    $music2Path = $musicFolder . basename($_FILES["music2"]["name"]);
    move_uploaded_file($_FILES["music2"]["tmp_name"], $music2Path);
    $music3Path = $musicFolder . basename($_FILES["music3"]["name"]);
    move_uploaded_file($_FILES["music3"]["tmp_name"], $music3Path);

    // Get other form data
    $description = $_POST["description"];

    // Insert the data into the database
    $servername = "localhost";
    $dbUsername = "root";
    $password = "";
    $dbname = "signupacc";

    $conn = new mysqli($servername, $dbUsername, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO gallery_items (uploader_username, image, description, music_one, music_two, music_three)
            VALUES ('$uploaderUsername', '$imagePath', '$description', '$music1Path', '$music2Path', '$music3Path')";

    if ($conn->query($sql) === TRUE) {
        // Successfully inserted data
        header("Location: gallery.php?success=1"); // Redirect back to the gallery page with a success message
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Redirect the user to the login page if they are not logged in
    header("Location: login.php");
}

?>
