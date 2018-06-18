<?
// Скрипт проверки

// Соединямся с БД
include "../functions/connect.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($conn, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "access denied";
    }
    else
    {
        echo'<meta http-equiv = "Refresh" content = "0 ; URL = menu.html">';
    }
}
else
{
    print "Включите куки";
}
?>