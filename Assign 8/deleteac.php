<html>
    <body>
        GOODBYE !!!
    <?php

        // servername => localhost
        // username => root
        // password => rishikant
        // database name => Assign8
        $conn = mysqli_connect("localhost:3306", "root", "rishikant", "Assign8");

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        session_start();
        $id = $_SESSION['id'];

        $sql = "DELETE FROM users WHERE id = '$id'";

        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            echo "<h3>Account Successfully Deleted</h3>";

        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        echo '<script type="text/javascript">

            window.onload = function () { alert("Account Deleted"); }

        </script>';

        session_unset();

// destroy the session
session_destroy();
        //sleep(5);
        header("Location:index.html");