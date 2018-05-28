<?php
    //date_default_timezone_set('UTC');
    include_once("../functions/connect.php");

    $query = mysqli_query($conn, "SELECT created_at, COUNT(code_number) as codes FROM code WHERE isChecked = '1' GROUP BY EXTRACT(DAY FROM created_at)");
    while($record = $query->fetch_row()){
        $all[] = array(strtotime($record[0]), (int)$record[1]);
    }
    echo json_encode($all);
?>