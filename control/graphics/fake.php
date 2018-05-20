<?php
    header('Content-Type: application/json');

    include_once('../../functions/connect.php');
    $query = sprintf("SELECT geo, COUNT(code) as count_of_query FROM fake GROUP BY geo");
    $result = mysqli_query($conn, $query);

    $data = array();
    
    foreach ($result as $row){
        $data[] = $row;
    }
    print json_encode($data);
?>