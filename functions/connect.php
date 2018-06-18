<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'DaidoMetalRussiaDB');
    mysql_set_charset('utf8');
    if(!conn){
        die('Error: ' . mysqli_connecr_errno());
    }
?>
