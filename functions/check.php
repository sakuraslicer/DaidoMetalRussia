<?php
    session_start();
    if(isset($_POST['check'])){
        // Подключение к БД
        include_once('connect.php');
        // Получение текущей даты
        include_once('date.php');
        // Отследить локацию
        include '../geo/DefineIP.php';
        // Получение введенного кода
        $code = preg_replace('/\s+/', '', $_POST['code']);
        // Занесение его в сессию для передачи в сообщение
        $_SESSION['code'] = $code;
        // Получение введенного телефона
        $phone = $_POST['phone'];
        // Проверка наличия кода в БД
        include_once('checker.php');
        
        //[TESTER]
        echo("Введенный код: $code<br>Оригинал:<br>");
        echo "1 столбец: ".$quebec[0]."<br> 2 столбец: ".$quebec[1]."<br>Таблица проверенных кодов: ".$whiskey[0]."<br>Количество проверок: ".$whiskey[1];

        // print_r($original);
        // echo("<br>");
        // print_r($_checked);
        // echo("<br>");
        // print_r($checked);

        //echo("<br>"."count: ".$count."<br>"."exist1: ".$exist1."<br>"."exist2: ".$exist2."<br>"."exist3: ".$exist3."<br>");

        // Код в БД существует и он проверялся
        if($quebec[0] && $quebec[1] && $whiskey[0]){
            $count++;
            $_SESSION['response'] = 2;
            // Если код проверялся больше 1 раза - увеличить счетчик повторных проверок
            $sql = mysqli_query($conn, "UPDATE checked SET count_of_query = '$count' WHERE code = '$code'");
            echo'<meta http-equiv = "Refresh" content = "0 ; URL = ../index.php">';

            //echo("Код в БД существует и он проверялся");
        }
        // Код проверялся только 1 раз и в данный момент проверяется повторно
        else if($quebec[0] && $quebec[1] && !$whiskey[0]){
            $_SESSION['response'] = 2;
            $sql = mysqli_query($conn, "INSERT INTO checked (code, count_of_query, phoneNumber, geo, comment, created_at) VALUES ('$code', '1', '$phone', '$region_ru', 'Проверен повторно', '$date')");
            echo'<meta http-equiv = "Refresh" content = "0 ; URL = ../index.php">';

            //echo("Код проверялся только 1 раз и в данный момент проверяется повторно");
        }

        // Код в БД существует и не проверялся [Оригинал]
        if($quebec[0] && !$quebec[1]){
            $_SESSION['response'] = 1;
            $sql = mysqli_query($conn, "UPDATE code SET compare = '$code', isChecked = '1', phoneNumber = '$phone', geo = '$region_ru', comment = 'Оригинал', created_at = '$date' WHERE code_number = '$code'");
            echo'<meta http-equiv = "Refresh" content = "0 ; URL = ../index.php">';

            //echo("Код в БД существует и не проверялся");
        }

        // Код в БД не существует
        if(!$quebec[0]){
            $_SESSION['response'] = 3;
            $sql = mysqli_query($conn, "INSERT INTO fake (code, phoneNumber, geo, comment, created_at) VALUES ('$code', '$phone', '$region_ru', 'Контрафакт', '$date')");
            echo'<meta http-equiv = "Refresh" content = "0 ; URL = ../index.php">';

            //echo("Код в БД не существует");
        }
    }
?>