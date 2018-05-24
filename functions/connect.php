<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'DaidoMetalRussiaDB');
    if(!conn){
        die('Error: ' . mysqli_connecr_errno());
    }
?>
