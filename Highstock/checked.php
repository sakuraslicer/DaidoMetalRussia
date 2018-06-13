<?php
    //date_default_timezone_set('UTC');
    include_once("../functions/connect.php");

    $query = mysqli_query($conn, "SELECT geo, count_of_query FROM checked GROUP BY geo");
    while($record = $query->fetch_row()){
        $all[] = array($record[0], (int)$record[1]);
    }
    echo json_encode($all);
?>