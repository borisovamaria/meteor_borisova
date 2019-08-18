<?php include_once('authorization.php'); ?>
<link href="cssfile.css" rel="stylesheet">
<html lang="ru">
<div class="entry">
    <div style="text-align: center;"><h1>Авторизация</h1></div>
    <form method="POST">
        <input name="login" placeholder="Введите логин"" required /><br><br>
        <input name="password" placeholder="Введите пароль" required type="password"/><br><br>
        <input name="btn" type="submit" value="Войти" class="button"/>
    </form>
        <form action="reg.php">
        <input type="submit" class="button" value="Регистрация">
    </form>
</div>
<div id="error" class="error">
    <?
    $func = 'avt';
    $func();
    ?>
</div>
</html>