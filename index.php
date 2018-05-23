<?php session_start();

    if($_SESSION['response'] == 1) {
        $Response = $_SESSION['response'];
        $Status = "Оригинал!";

        $msgcode = $_SESSION['code'];
        $one = substr($msgcode, 0, 3);
        $two = substr($msgcode, 3, 3);
        $three = substr($msgcode, 6, 3);
        $four = substr($msgcode, 9, 3);

        $Message = "Код ".$one."-".$two."-".$three."-".$four." подтвержден.<br>Вы приобрели оригинальную продукцию «Дайдо Металл Русь»<br>Компания «Дайдо Металл Русь» благодарит Вас за выбор нашей продукции.";
        unset($_SESSION['response']);
        session_destroy();
    }
    else if($_SESSION['response'] == 2) {
        $Response = $_SESSION['response'];
        $Status = "Повторная проверка!";

        $msgcode = $_SESSION['code'];
        $one = substr($msgcode, 0, 3);
        $two = substr($msgcode, 3, 3);
        $three = substr($msgcode, 6, 3);
        $four = substr($msgcode, 9, 3);

        $Message = "Код ".$one."-".$two."-".$three."-".$four." проверен ранее.<br>Возможно, данный товар - подделка<br>За консультацией обратитесь по телефону +7 910-105-2000<br>";
        unset($_SESSION['response']);
        session_destroy();
    }
    else if($_SESSION['response'] == 3) {
        $Response = $_SESSION['response'];
        $Status = "Внимание, контрафакт!";

        $msgcode = $_SESSION['code'];
        $one = substr($msgcode, 0, 3);
        $two = substr($msgcode, 3, 3);
        $three = substr($msgcode, 6, 3);
        $four = substr($msgcode, 9, 3);;

        $Message = "Код ".$one."-".$two."-".$three."-".$four." не подтвержден.<br>Если Вы не ошиблись при вводе кода, продукция является поддельной.<br>За консультацией обратитесь по телефону +7 910-105-2000<br>";
        unset($_SESSION['response']);
        session_destroy();
    }
?>
<html>
    <head>
        <!--Head-->
        <meta charset="UTF-8">
        <title>Daido Metal Russia Protect</title>
        <!--Styles-->
        <link rel="stylesheet" href="css/index.css">
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
        <!--jQuery-->
        <script type="text/javascript" src="includes/jquery-3.3.1.min.js"></script>
        <!--Bootstrap-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--Mask script-->
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>

        <script type="text/javascript">

            function PageReload(){

                var a = {
                    code: <?php echo($Response); ?>,
                    toString: function(){
                        return this.code;
                    }
                };

                if(a.code == '1'){
                    $('.modal-wrapper').toggleClass('open');
                    $('.wrapper').toggleClass('blur-it');
                }
                if(a.code == '2'){
                    $('.modal-wrapper').toggleClass('open');
                    $('.wrapper').toggleClass('blur-it');
                }
                if(a.code == '3'){
                    $('.modal-wrapper').toggleClass('open');
                    $('.wrapper').toggleClass('blur-it');
                }
            }
            window.onload = PageReload;

        </script>
    </head>
    <body>
        <!--Body-->
        <div class="wrapper">
            <!--Main form-->
            <form action="functions/check.php" method="POST" class="mainform">
                <!--Form content-->
                <!--Title-->
                <label for="Echo"><div class="title">Дайдо Металл Русь <br>Защита от подделок</div></label>
                <!--Text boxes-->
                <input type="text" id="Echo" name="code" pattern="^[ 0-9]{15}" maxlength="15" placeholder="Ваш код:" class="checked" required>
                <input type="text" id="Foxtrot" name="phone" pattern="^((8|\+?)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,15}$"  placeholder="Ваш номер телефона:" class="checked" required>
                <!--Phone example-->
                <div class="example">Например: +79000000000</div>
                <!--Button-->
                <input type="submit" id="button" name="check" value="Проверить" class="check-button">
                <!--Link-->
                <a href="http://www.daidorussia.ru/" target="_blank"><p>2009. © DAIDO METAL RUSSIA</p></a>
                <!--Code mask-->
                <script type="text/javascript">
                    jQuery(function($){$("#Echo").mask("999 999 999 999");});
                </script>
            </form>
        </div>

        <link rel="stylesheet" href="css/modal.css">

        <!--Modal window-->
        <div class="modal-wrapper">
            <div class="modal">
                <div class="head">
                    <a class="btn-close trigger" href="index.php">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="content">
                    <div class="message-text">
                        <h1><?php echo($Status); ?><br></h1>
                        <h1><?php echo($Message); if($Response == 2 || $Response == 3){echo('или отправьте <a href="http://daidorussia.ru/contacts" target="_blank">нам сообщение</a>');}?></h1>
                    </div>
                </div>
            </div>
        </div>

        <link rel="stylesheet" href="css/menu.css">
        <header class="header">
            <div class="hamburger">
                <button class="button hamburger__button js-menu__toggle">
                <span class="hamburger__label">Open menu</span>
                </button>
            </div>
            <nav class="menu">
                <ul class="list menu__list">
                <li class="menu__group">
                    <a href="http://www.daidorussia.ru/" class="link menu__link">Главная</a>
                </li>
                <li class="menu__group">
                    <a href="http://www.daidorussia.ru/about" class="link menu__link">О компании</a>
                </li>
                <li class="menu__group">
                    <a href="http://www.daidorussia.ru/catalogue" class="link menu__link">Продукция</a>
                </li>
                <li class="menu__group">
                    <a href="http://www.daidorussia.ru/contacts" class="link menu__link">Контакты</a>
                </li>
                </ul>
            </nav>
        </header>
        <script  src="js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>
