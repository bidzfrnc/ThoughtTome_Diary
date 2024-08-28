<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home-page.css">
    <title> </title>
</head>
<body>

    <header>
        <div class="web">
            <h1 class="web-name">ThoughtTome</h1>  
        </div>

        <nav>
            <a href="home-page.php" class="links" id="active">Home</a>
            <a href="gallery.php" class="links">My Gallery</a>
            <a href="main.php" class="links">Log Out</a>
        </nav>
    </header>

    <section>
        <div class="con1">
            <div class="details">
            <?php
                session_start();

                if (isset($_SESSION['username'])) {
                    $sessionUsername = $_SESSION['username']; 
                    $servername = "localhost";
                    $dbUsername = "root";
                    $password = "";
                    $dbname = "signupacc";

                    $conn = new mysqli($servername, $dbUsername, $password, $dbname); 

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM registered_acc WHERE username = '$sessionUsername'"; 
                    $result = $conn->query($sql);

                    

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        $_SESSION['profile_img'] = $row['profile_img'];
                    }
                ?>  
                <div class="audio-container">
                    <audio controls class="audio" >
                        <source src="<?php echo $row['bg_music']; ?>" type="audio/mpeg">
                    </audio>
                </div>

                <div class="image_box">
                    <img src="<?php echo $row['profile_img']; ?>" alt="Profile Image" class="image_profile">
                </div>
                    <div class="info">
                        <h1 class="info-wel"> Welcome: <?php echo $row['username']; ?> ! </h1>
                        <h3 class="info-text"> Fullname: <?php echo $row['fullname']; ?> </h3>
                        <h3 class="info-text"> Email: <?php echo $row['email']; ?>  </h3>
                        <h3 class="info-text"> Address: <?php echo $row['address']; ?>  </h3>
                        <h3 class="info-text"> Course: <?php echo $row['course']; ?>  </h3>
                        <h3 class="info-text"> Phone No: <?php echo $row['phone_no']; ?> </h3>
                        <h3 class="info-text"> Gender: <?php echo $row['gender']; ?>  </h3>
                        <div class="about_me_box">
                            <h3 class="info-text"> Description: <?php echo $row['about_self']; ?>  </h3>
                        </div>
                </div>
            </div>
        </div>

        <div class="con2">
            <div class="upload-box">

                <div class="upload-diary-text">
                    <h3 class="ask">Share your diary <?php echo $row['fullname']; ?> </h3>
                </div>
                <div class="upload_diary_box">
                    <button type="button" id="upload_diary_btn" class="upload_diary_btn">Upload Diary</button>
                </div>
            </div>


            <div class="diary-box">
                    <?php
                        $diaryQuery = "SELECT * FROM diary_tbl";
                        $diaryResult = $conn->query($diaryQuery);

                        if ($diaryResult === false) {
                            die("Database error: " . $conn->error); 
                        }

                        if ($diaryResult->num_rows > 0) {
                            while ($row = $diaryResult->fetch_assoc()) {
                                ?>

                                <div class="content-box">
                                    <div class="title-box">
                                        <p class="d_title"><?php echo htmlspecialchars($row['diary_title']); ?></p>
                                    </div>
                                    
                                    <div class="content">
                                        <p class="context"><?php echo htmlspecialchars($row['diary_content']); ?></p>
                                    </div>

                                    <div class="others">
                                        <div class="left">
                                            <div class="img-name">
                                                <img src="<?php echo htmlspecialchars($row['profile_image']); ?>" alt="Profile Image" class="uploader_img"> 
                                                <p class="name"><?php echo htmlspecialchars($row['uploader_username']); ?></p>
                                            </div>

                                            <div class="cat">
                                                <p>Category: <?php echo htmlspecialchars($row['category']); ?></p>
                                            </div>
                                        </div>

                                            <div class="r-date">
                                                <p>Date: <?php echo htmlspecialchars($row['date_upload']); ?></p>
                                            </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No diary entries found.";
                        }

                        $diaryResult->close();
                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    $conn->close();
                    } else {
                        
                        header("Location: login.php");
                    }
                ?>
        </div>

        <div class="diaryUploadForm" id="diaryUploadForm">
            <div class="diary_formBox">
                <div class="diaryformtitle">
                    <h1 class="upload-title">Upload Diary</h1>
                </div>
                <div class="diary-field-box">
                        <form action="entry_diary.php" method="POST">
                        <input type="hidden" name="uploader_username" value="<?php echo $_SESSION['username']; ?>">
                        <input type="hidden" name="profile_image" value="<?php echo $_SESSION['profile_img']; ?>">

                            <label for="diary_title" class="label_diary">Topic: </label>
                            <input type="text" name="diary_title" id="diary_title" class="diary_input"> <br>
                        
                            <label for="category" class="label_diary">Category: </label>
                            <input type="text" name="custom_category" id= "custom_category" placeholder = " if Others please specify'" class="custom_category">
                            <select name="category" id="category" class="diary_input_cat">
                                <option value="Home">Home</option>
                                <option value="Personal">Personal</option>
                                <option value="School">School</option>
                                <option value="Peers">Peers</option>
                                <option value="Others">Others</option>
                            </select> <br>

                            <label for="diary_content" class="label_diary">Content Diary: </label>
                            <textarea name="diary_content" id="diary-content" class="diary-content"></textarea> <br>

                            <label for="date_upload" class="label_diary">Date: </label>
                            <input type="date" name="date_upload" id="date_upload" class="diary_input"> <br>

                            <button type="submit" class="upload_btn">Upload</button>

                        </form>
                </div>
                    <button type="button" class="cancel_btn">Cancel</button>
            </div>
        </div>

        <div class="con3">
                <?php
                if (isset($_SESSION['username'])) {
                    $sessionUsername = $_SESSION['username'];
                    $servername = "localhost";
                    $dbUsername = "root";
                    $password = "";
                    $dbname = "signupacc";

                    $conn = new mysqli($servername, $dbUsername, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT i_frame FROM registered_acc WHERE username = '$sessionUsername'";
                    $result = $conn->query($sql);

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();

                    }
                    ?>
                        <div class='iframe-container'>
                            <?php echo $row['i_frame']; ?>
                        </div>
                    <?php
                    $conn->close();
                    }
                    ?>
        </div>
    </section>
</body>
</html>

<script>
var diaryUploadForm = document.getElementById("diaryUploadForm");
var upload_diary_btn = document.getElementById("upload_diary_btn");
var cancel_btn = document.getElementsByClassName("cancel_btn")[0];

upload_diary_btn.onclick = function(){
    diaryUploadForm.style.display = "block";
}

cancel_btn.onclick = function(){
    diaryUploadForm.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == diaryUploadForm) {
        diaryUploadForm.style.display = "none";
    }
}

function getCurrentDate() {
const now = new Date();
const year = now.getFullYear();
const month = String(now.getMonth() + 1).padStart(2, '0'); 
const day = String(now.getDate()).padStart(2, '0');
return `${year}-${month}-${day}`;
}
document.getElementById('date_upload').value = getCurrentDate();



document.getElementById("category").addEventListener("change", function () {
    var customCategoryInput = document.getElementById("custom_category");
    if (this.value === "Others") {
        customCategoryInput.style.display = "block";
    } else {
        customCategoryInput.style.display = "none";
    }
});
</script>
