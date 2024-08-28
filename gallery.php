<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gallery.css">
    <title>Gallery</title>
</head>
<body>
        <header>
            <div class="web">
                <h1 class="web-name">ThoughtTome</h1>  
            </div>

            <nav>
            <a href="home-page.php" class="links">Home</a>
            <a href="gallery.php" class="links" id="active">My Gallery</a>
            <a href="main.php" class="links">Log Out</a>
            </nav>
        </header>

        <section>
            <div class="gallery-box">
                <div class="gallery-title">
                    <h2 class="title">Gallery</h2>
                    <div class="upload-box">
                        <button type="button" class="upload_btn" id="upload_btn">Upload</button>
                    </div>


                    <div class="gallery_Upload" id="gallery_Upload">
                        <div class="upload_new_gallery">
                            <div class="new_gallery">
                                <h1 class="upload-title">Upload Image and 3 Music</h1>
                            </div>
                            <div class="gallery-field-box">
                                    <form action="upload_gallery.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="uploader_username" value="<?php echo $sessionUsername; ?>">
                                        <div class="box_new_gallery">
                                            <div class="img_upload_gallery">
                                                <img id="preview" src="" alt="Image Preview" class="new-img-upload">
                                            </div>
                        
                                            <label for="images_gallery" class="label_Upload">Select Photo:</label>
                                            <input type="file" name="images_gallery" id="imageInput" class="Input" required>
                                            <br>

                                            <label for="description" class="label_Upload">Description:</label>
                                            <textarea name="description" id="description" class="description" required></textarea> <br>

                                            <label for="music1" class="label_Upload">Music 1:</label>
                                            <input type="file" name="music1" class="Input" required> <br>
                                            <label for="music2" class="label_Upload">Music 2:</label>
                                            <input type="file" name="music2" class="Input" required> <br>
                                            <label for="music3" class="label_Upload">Music 3:</label>
                                            <input type="file" name="music3" class="Input" required> <br>
                                        </div>
                                            <button type="submit" class="btn_upload">Upload</button>
                                    </form>
                            </div>
                                <button type="button" class="cancel_btn" id="cancel_btn">Cancel</button>
                        </div>
                    </div>
                </div>

                <div class="gallery-con">
                <?php
session_start(); // Start the session to access user information

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signupacc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the user is logged in and get their username from the session
if (!isset($_SESSION['username'])) {
    // Redirect to a login page or display an error message
    echo "Please log in to view your uploads.";
} else {
    $currentUsername = $_SESSION['username'];

    // Query the database to fetch items uploaded by the current user
    $sql = "SELECT image, description, music_one, music_two, music_three FROM gallery_items WHERE uploader_username = '$currentUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageSrc = $row['image'];
            $description = $row['description'];
            $music_1 = $row['music_one'];
            $music_2 = $row['music_two'];
            $music_3 = $row['music_three'];
    ?>
        <div class="gallery-list">
            <div class="gallery-img-box">
                <img src="<?php echo $imageSrc; ?>" alt="Uploaded Image" class="new-img-upload">
            </div>
            <div class = "description">
                <p class="text"> <?php echo ($row['description']); ?></p>
            </div>

            <div class="audio-box">
                <div class="audio-container">
                    <audio controls class="audio">
                        <source src="<?php echo $music_1; ?>" type="audio/mpeg"> <!-- Music 1 -->
                    </audio>
                </div>
                <div class="audio-container">
                    <audio controls class="audio">
                    <source src="<?php echo $music_2; ?>" type="audio/mpeg"> <!-- Music 1 -->
                    </audio>
                </div>
                <div class="audio-container">
                    <audio controls class="audio">
                        <source src="<?php echo $music_3; ?>" type="audio/mpeg"> <!-- Music 1 -->
                    </audio>
                </div>
            </div>
        </div>
    <?php
        }
    } else {
        echo "You haven't uploaded any items yet.";
    }
}
?>
                </div>
            </div>
        </section>

        <footer>

        </footer>
        <script src="gallery.js"></script>
</body>
</html>
