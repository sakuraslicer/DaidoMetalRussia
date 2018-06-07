<?php
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
include "connect.php";

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($conn, "SELECT id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($conn ,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($conn, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE id='".$data['id']."'");

        // Ставим куки
        setcookie("id", $data['id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30, null, null, null, true); // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: usercheck.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Authorization</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/signin.css" />
    </head>
    <body>
        <div id="login">
            <form method="POST">
                <span class="fontawesome-user"></span>
                <input type="text" id="user" name="login" placeholder="Пользователь:">

                <span class="fontawesome-lock"></span>
                <input type="password" id="pass" name="password" placeholder="Пароль:"><br>
                <input type="submit" value="Войти" name="submit">
            </form>
        </div>
    </body>
</html>