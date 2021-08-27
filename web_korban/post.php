<?php 

    require './config.php';


    if(isset($_POST)) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);


        $query = "INSERT INTO comments (name, email, website, comment)
        VALUES ('$name', '$email', '$website', '$comment')";

        // $result = mysqli_query($conn, $query);
        if (mysqli_query($conn, $query)) {
            echo "New record created successfully";
        } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        
    }

    header("Location: index.php");



    

?>