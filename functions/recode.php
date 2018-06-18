<?php
    include_once('connect.php');
    $res = mysqli_query($conn, "SELECT * FROM `fake`");
    $whiskey = mysqli_fetch_array($res);
    while (($row = mysqli_fetch_assoc($res)) !== false) {
        $s = iconv('windows-1252', 'utf-8', $row['comment']);
        $q = 'update `fake` set comment = "'.addslashes($s).'" where id = '.$row['id'];
        mysqli_query($conn, $q);
    }
?>