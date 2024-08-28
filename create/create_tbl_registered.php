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


    $sql = "CREATE TABLE registered_acc (
        account_id int (11) auto_increment primary key,
        profile_img BLOB,
        fullname VARCHAR (255) NOT NULL, 
        username VARCHAR (255) NOT NULL, 
        email VARCHAR (255) NOT NULL, 
        address TEXT NOT NULL,
        course TEXT NOT NULL,
        phone_no VARCHAR (255) NOT NULL, 
        about_self TEXT NOT NULL,
        password VARCHAR (255) NOT NULL, 
        gender VARCHAR(50) NOT NULL,
        bg_music LONGBLOB,
        i_frame TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        if ($conn->query($sql) === TRUE) {
            echo "Table registered_acc Created Successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        
        $conn->close();

?>