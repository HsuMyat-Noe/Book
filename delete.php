<?php

    $host = 'localhost';
    $db = 'book';
    $user = 'root';
    $pass = '';

    $db = mysqli_connect($host,$user,$pass,$db);

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $qry = "DELETE FROM book WHERE id = $id";
        mysqli_query($db, $qry);

        header("location:index.php");
    }
    
?>