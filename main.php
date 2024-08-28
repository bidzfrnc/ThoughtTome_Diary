<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <title>Main</title>
</head>
<body>
    <header>

    </header>

    <section class="sect1">
        <div class="container1">
            <div class="con-box">
                    <h1 class="web-name">ThoughtTome</h1>
                    <h4 class="qoute">"Capturing the Moments, Preserving the Memories."</h4>
                    <p class="text"></p>
            </div>
        </div>

        <div class="container2" id="container">
            <div class="form-box">
                <h1 class="loginTitle">Log In</h1> 
                        <form action="login.php" method="POST">
                            <div class="input">
                                <label for="username" class="f_label"><i class="bi bi-person-fill"></i> Username:</label>
                                <input type="text" name="username" id="username" class="f_input" required> <br>

                                <label for="password" class="f_label"><i class="bi bi-key-fill"></i> Password:</label>
                                <input type="password" name="password" id="password" class="f_input" required> <br>
                            </div>
                                <button type="submit" class="log_in" name="login_btn">Log In</button> <br>
                            <div class="f_pass">
                                <a href="#" class="forgetpass">Forget Password</a>
                            </div>
                        </form>

                <div class="popUp">
                    <button type="button" class="signUp1" id="signUp1">Sign Up</button>
                </div>
            </div>
        </div>

    </section>

    <div class="signUpForm" id="signUpForm">
            <h1 class="signupTitle">Sign Up</h1>
        <div class="signUpField">
            <form action="main_register.php" method="POST" enctype="multipart/form-data">
                    <div class="img_profile">
                        <img id="preview" src="" alt="Image Preview" class="img-upload">
                    </div>
                    <div class="inputs">
                        <label for="profile_img" class="label_signUp"><i class="bi bi-person-square"></i> Profile:</label>
                        <input type="file" name="profile_img" id="imageInput" class="profileInput" required>
                        <br>
                    </div>

                    <div class="inputs">
                        <label for="fullname" class="label_signUp"><i class="bi bi-person-circle"></i> Full Name:</label>
                        <input type="text" name="fullname" id="fullname" class="input_SignUp" required> <br>
                    </div>

                    <div class="inputs">
                        <label for="username" class="label_signUp"><i class="bi bi-person"></i> Username:</label> 
                        <input type="text" name="username" id="username" class="input_SignUp" required> <br>
                    </div>

                    <div class="inputs">
                        <label for="email" class="label_signUp"><i class="bi bi-envelope"></i> Email:</label>
                        <input type="email" name="email" id="email" class="input_SignUp" required> <br>
                    </div>

                    <div class="location">
                        <label for="address" class="label_signUp"><i class="bi bi-geo-alt"></i> Address:</label>
                        <textarea name="address" id="address_SignUp" class="address_SignUp" required></textarea>
                    </div>

                    <div class="inputs">
                        <label for="course" class="label_signUp" ><i class="bi bi-mortarboard"></i> Course: </label>
                        <input type="text" name="course" id="course" class="input_SignUp" required>
                    </div>

                    <div class="inputs">
                        <label for="phone_no" class="label_signUp"><i class="bi bi-telephone"></i> Phone No:</label>
                        <input type="type" name="phone_no" id="phone_no" class="input_SignUp" required> <br>
                    </div>

                    <div class="about_me">
                        <label for="about_self" class="label_signUp"><i class="bi bi-file-earmark-person"></i> About You:</label>
                        <textarea name="about_self" id="aboutme_SignUp" class="aboutme_SignUp" required></textarea>
                    </div>

                    <div class="inputs">
                        <label for="pword" class="label_signUp"><i class="bi bi-key"></i> Password:</label>
                        <input type="text" name="pword" id="pword" class="input_SignUp" required> <br>
                    </div>

                    <div class="inputs">
                        <label for="gender" class="label_signUp"><i class="bi bi-gender-ambiguous"></i> Gender:</label>
                        <div class="sel_gender">
                                <label class="gen-der">
                                    <input type="radio" name="gender" id="male" value="Male" required>
                                    <div class="op_gender"><i class="bi bi-gender-male"></i> Male</div>
                                </label>

                                <label class="gen-der">
                                    <input type="radio" name="gender" id="female" value="Female" required>
                                    <div class="op_gender"><i class="bi bi-gender-female"></i> Female</div>
                                </label>
                        </div>
                    </div>

                    <div class="inputs">
                        <label for="bg_music" class="label_signUp"><i class="bi bi-music-note"></i> Music:</label>
                        <input type="file" name="bg_music" class="musicInput" required> <br>
                    </div>

                    <div class="i_frame">
                        <label for="video" class="label_signUp"><i class="bi bi-camera-reels"></i> Video:</label>
                        <textarea name="video" id="video_SignUp" class="video_SignUp" required></textarea>
                    </div>
            </div>

                <button type="submit" class="signUp2">SignUp</button>

            </form>

            <button type="button" id="closebtn" class="close">Close</button>
    </div>
    <footer>

    </footer>

    <script src="main.js"></script>
</body>
</html>