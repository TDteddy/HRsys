<?php
    // Database configuration
    $dbHost     = "event-price.com";
    $dbUsername = "dbuser";
    $dbPassword = "asdfqwerty@1234*";
    $dbName     = "links";

    // Create database connection
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Get post data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $workername = $_POST['workername'];
        $sheetcase = $_POST['sheetcase'];
        $password = $_POST['password'];

        // Insert data into the database
        $query = "INSERT INTO insainfo (workername, sheetcase, password) 
        VALUES ('$workername', '$sheetcase', '$password')";

        if(mysqli_query($db, $query)){
            echo '<script type="text/javascript">'; 
            echo 'alert("평가대상자등록완료!");'; 
            echo 'window.location.href = "index.html";';
            echo '</script>';

        } else{
            echo '<script type="text/javascript">'; 
            echo 'alert("평가대상자등록실패!");'; 
            echo 'window.location.href = "index.html";';
            echo '</script>';
        }
    }

    // Close connection
    $db->close();
?>