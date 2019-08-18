<?php include_once('registration.php'); ?>
<link href="cssfile.css" rel="stylesheet">
<script src="script.js"></script>
<div class="entry">
    <div style="text-align: center;"><h1>Регистрация</h1></div>
    <form method="POST" onsubmit="return checkPass()">
        <label>
            <input name="name" placeholder="Введите логин" required/>
        </label> <br><br>
        <label>
            <input name="emailaddress" placeholder="Введите Email" type="email" required/>
        </label><br><br>
        <label for="password"></label><input name="password" id="password" type="password" placeholder="Задайте пароль" onkeyup='check();'
                                             required/><br><br>
        <label for="password2"></label><input name="password2" id="password2" type="password" placeholder="Повторите пароль" onkeyup='check();'
                                              required/><br><br>
        <input name="submit" class="button" type="submit" value="Зарегистрироваться"/>
    </form>
    <form action="index.php">
        <input type="submit" class="button" value="Страница входа">
    </form>
</div>
<?
$func = 'reg';
$func();
?>
