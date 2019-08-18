<? session_start();
function reg()
{
    $login = $_POST['name'];
    $email = $_POST['emailaddress'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $db = new mysqli ("localhost", "root", "", "meteor");
    $rezlog = mysqli_query($db, "select * from `user` where `login`='" . $login . "'");
    $row = mysqli_fetch_array($rezlog);
    if (isset($_POST['submit'])) {
        do {
            if ($login != $row["login"]) {
                $db->set_charset("utf8");
                $r = "insert into `user` (`login`,`password`,`email`) value('$login','$password','$email')";
                $db->query($r);

                echo 'Регистрация прошла успешно. Выполните авторизацию';
            } else {
                echo 'Логин занят';
            }
        } while ($row = mysqli_fetch_array($rezlog));
    }
}

?>

