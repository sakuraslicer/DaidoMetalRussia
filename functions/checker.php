<?php
    // Таблица code 1 столбец
    $original = mysqli_query($conn, "SELECT code_number FROM code WHERE EXISTS(SELECT code_number FROM code WHERE code_number='$code')");
    // Таблица code 2 столбец
    $checked = mysqli_query($conn, "SELECT compare FROM code WHERE EXISTS(SELECT code_number FROM code WHERE compare='$code')");
    
    // Проверка существования ячейки
    $exist1 = $original->num_rows;
    $exist2 = $checked->num_rows;

    // Таблица checked - забрать все
    $mttt = mysqli_query($conn, "SELECT * FROM checked WHERE code = '$code'");
    // Достать ячейку с количеством проверок кода в переменную
    $countcheck = mysqli_fetch_row($mttt);
    $count = $countcheck['2'];
    $count = (int)$count;
?>