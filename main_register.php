<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signupacc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username'])) {
    $fullname = $_POST['fullname'];
    $newUsername = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $phone_no = $_POST['phone_no'];
    $about_self = $_POST['about_self'];
    $password = $_POST['pword'];
    $gender = $_POST['gender'];
    $video = $_POST['video'];


    //HASHING PASSWORD
    $hash_password = password_hash($password, PASSWORD_DEFAULT);


    // Handle profile image upload
    $profile_img_path = "";
    if ($_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
        $profile_img_tmp_name = $_FILES['profile_img']['tmp_name'];
        $profile_img_name = $_FILES['profile_img']['name'];
        $profile_img_path = "register/profile_img/" . $newUsername . "_" . $profile_img_name;
        move_uploaded_file($profile_img_tmp_name, $profile_img_path);
    }

    // Handle background music upload
    $bg_music_path = "";
    if ($_FILES['bg_music']['error'] === UPLOAD_ERR_OK) {
        $bg_music_tmp_name = $_FILES['bg_music']['tmp_name'];
        $bg_music_name = $_FILES['bg_music']['name'];
        $bg_music_path = "register/bg_music/" . $newUsername . "_" . $bg_music_name;
        move_uploaded_file($bg_music_tmp_name, $bg_music_path);
    }



    // Insert the new record into the database
    $insertQuery = "INSERT INTO registered_acc (profile_img, fullname, username, email, address, course, about_self, phone_no, password,  gender, bg_music, i_frame )
                    VALUES ('$profile_img_path', '$fullname', '$newUsername', '$email', '$address', '$course', '$about_self', '$phone_no', '$hash_password', '$gender', '$bg_music_path', '$video' )";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Account created successfully";
        // header("Location: main.php");
        echo '<script type="text/javascript">
        alert("Acount Created Successfully!");
        window.location.href = "main.php"
        </script>';
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>
