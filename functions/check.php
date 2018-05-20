<?php
    session_start();
    if(isset($_POST['check'])){
        // Подключение к БД
        include_once('connect.php');
        // Получение текущей даты
        include_once('date.php');
        // Получение введенного кода
        $code = preg_replace('/\s+/', '', $_POST['code']);
        // Занесение его в сессию для передачи в сообщение
        $_SESSION['code'] = $code;
        // Получение введенного телефона
        $phone = $_POST['phone'];
        // Проверка наличия кода в БД
        include_once('checker.php');

        // Код в БД существует и он проверялся
        if($count > 0){
            $count++;
            $_SESSION['response'] = 2;
            // Если код проверялся больше 1 раза - увеличить счетчик повторных проверок
            $sql = mysqli_query($conn, "UPDATE checked SET count_of_query = '$count' WHERE code = '$code'");
            echo'<meta http-equiv = "Refresh" content = "0 ; URL = ../index.php">';
        }
        // Если код проверялся только 1 раз и в данный момент проверяется повторно
        else if($count < 1){
            $_SESSION['response'] = 2;
            $sql = mysqli_query($conn, "INSERT INTO checked (code, count_of_query, phoneNumber, geo, comment, created_at, day_of_query, month_of_query, year_of_query) VALUES ('$code', '1', '$phone', 'test', 'Проверен повторно', '$date', '$dquery', '$mquery', '$yquery')");
            echo'<meta http-equiv = "Refresh" content = "0 ; URL = ../index.php">';
        }

        // Код в БД существует и не проверялся
        if($exist1 != 0 && $exist2 == 0){
            $_SESSION['response'] = 1;
            $sql = mysqli_query($conn, "UPDATE code SET compare = '$code', isChecked = '1', phoneNumber = '$phone', geo = 'test', comment = 'Оригинал', day_of_query = '$dquery', month_of_query = '$mquery', year_of_query = '$yquery' WHERE code_number = '$code'");
            echo'<meta http-equiv = "Refresh" content = "0 ; URL = ../index.php">';
        }

        // Код в БД не существует
        if($exist1 == 0){
            $_SESSION['response'] = 3;
            $sql = mysqli_query($conn, "INSERT INTO fake (code, phoneNumber, geo, comment, day_of_query, month_of_query, year_of_query) VALUES ('$code', '$phone', 'test', 'Контрафакт', '$dquery', '$mquery', '$yquery')");
            echo'<meta http-equiv = "Refresh" content = "0 ; URL = ../index.php">';
        }
    }
?>