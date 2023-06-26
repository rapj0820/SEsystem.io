<?php

    //MySQLi Procedural
    //mysqli_connect("host","username","password","databasename");

    $conn = mysqli_connect("localhost","root","","sanestebanis");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


?>