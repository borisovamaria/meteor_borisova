<?php
session_start();

function avt()
{

    $login = $_POST['login'];
    $password = $_POST['password'];
    $db = new mysqli ("localhost", "root", "", "meteor");
    $db->set_charset("utf8");
    $av = "select `password` from `user` where `login`='" . $login . "'";
    $result = $db->query($av);
    if (isset($_POST['btn'])) {
        if ($result->num_rows > 0) {
            $record = $result->fetch_assoc();
            if ($record['password'] != $password) {
                exit ('Пароль указан неверно');
            }
            session_start();
            $_SESSION['login'] = $login;
            echo "<script>document.location.href='upload.php'</script>";
        } else {
            exit ('Пользователь не найден');
        }
    }
}

?>
