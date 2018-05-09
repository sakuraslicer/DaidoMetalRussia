<?php
  include_once('connect.php');

  if(isset($_POST['do_signup'])){
        $log = $_POST['login'];
        $password = $_POST['password'];
        $new = password_hash($password, PASSWORD_DEFAULT);
        $sql = mysqli_query($conn, "INSERT INTO `users`(`login`, `password`) VALUES('$log', '$new')");
        if (!$sql) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
            }
        echo($login . "<br>" . $new);
        unset($login);
        unset($password);
  }
?>

<form action="creator.php" method="POST">

<p>
  <p><strong>Login: </strong></p>
  <input type="text" name="login">
</p>

<p>
  <p><strong>Password: </strong></p>
  <input type="password" name="password">
</p>

<p>
  <button type="submit" name="do_signup">Создать</button>
</p>

</form>