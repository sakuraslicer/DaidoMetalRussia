<?php
    include "connect.php";

    $q = 'select id, comment from `fake`';
    $res = mysqli_query($conn, $q);
    while (($row = mysqli_fetch_assoc($res))) {
        // Преобразуем из utf-8/latin1 в windows-1252
        $s = iconv('utf-8', 'windows-1252', $row['comment']);
        // Преобразуем строку из однобайтной кодировки обратно в utf-8, выдав её за windows-1251
        //$s = iconv('windows-1251', 'utf-8', $s);
        // Сохраняем назад в БД
        $q = 'update `fake` set comment = "'.addslashes($s).'" where id = '.$row['id'];
        mysqli_query($conn, $s);
        print_r($row);
    }
    print_r($row);
?>