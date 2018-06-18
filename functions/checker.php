<?php
    header('Content-Type: text/html; charset=utf-8');
    // Таблица code 
    $original = mysqli_query($conn, "SELECT code_number, compare FROM code WHERE code_number = '$code'");
    $quebec = mysqli_fetch_array($original);
    // Таблица checked
    $checked = mysqli_query($conn, "SELECT code, count_of_query FROM checked WHERE code = '$code'");
    $whiskey = mysqli_fetch_array($checked);
    // Количество проверок
    $count = $whiskey[1];
    $count = (int)$count;
?>
