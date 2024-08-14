<?php

    $host = 'localhost';
    $db = 'book';
    $user = 'root';
    $pass = '';

    $db = mysqli_connect($host,$user,$pass,$db);

    if($db == false) {
        die('Some Error: '.mysqli_connect_error());
    }else {
        echo "Database connectd succefully";
    }

?>