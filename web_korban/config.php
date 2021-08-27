<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "database_xss_steal_cookie";
    $url = "localhost/xss/web_korban";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>
