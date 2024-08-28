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

if (isset($_POST['login_btn'])) {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

     // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM registered_acc WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($stored_hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify the password
    if ($stored_hashed_password && password_verify($password, $stored_hashed_password)) {
        // Authentication successful
        session_start();
        $_SESSION['username'] = $username;
        echo '<script type="text/javascript">alert("Log In Successfully!");
        window.location.href = "home-page.php";</script>';
    } else {
        // Authentication failed
        echo '<script type="text/javascript">
        alert("Invalid username or password");
        window.location.href = "main.php";</script>';
    }
}

// Close the database connection
$conn->close();
?>