<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "meteor");
$con->set_charset("utf8");
$av = "select `id` from `user` where `login`='" . $_SESSION["login"] . "'";
$result = $con->query($av);
$resultimg = mysqli_query($con, $av);
$row = mysqli_fetch_array($resultimg);
$id_user = $row["id"];
$upload_image = $_FILES["image"]["name"];
$folder = "./images/";
$ext = explode('.', $_FILES['image']['name']);
$ext = strtolower($ext[count($ext) - 1]);
$allowTypes = array('jpg', 'jpeg', 'gif', 'png');
if (isset($_POST['btn'])) {
    if (in_array($ext, $allowTypes)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $_FILES["image"]["name"]);

        $result = mysqli_query($con, "INSERT INTO `image_table` (`id_user`,`name`) VALUES('$id_user','$upload_image')");
    } else
        echo "Недопустимый тип файла";
}
$resultimg = mysqli_query($con, "SELECT * FROM `image_table` where `id_user`='" . $id_user . "'");
$row = mysqli_fetch_array($resultimg);

if (isset($_POST['del'])) {
//echo $_POST['del'];	
    $delite = mysqli_query($con, "delete from `image_table` where `id`='" . $_POST['del'] . "'");
//$row = mysqli_fetch_array($resultimg); 
    $resultimg = mysqli_query($con, "SELECT * FROM `image_table` where `id_user`='" . $id_user . "'");
    $row = mysqli_fetch_array($resultimg);
}


do {
    if (!empty($row["name"])) {
        echo "<form method='POST'>";
        printf("<img src=" . $folder . $row["name"] . " width=100 height=100 class='minimized' id=" . $row["id"] . "><br>" . $row["name"] . "<br><button type='submit' name='del' class='down' value=" . $row["id"] . ">Удалить</button>");
        echo "</form>";
    } else {
        echo "Тут будут ваши картинки!";
    }
} while ($row = mysqli_fetch_array($resultimg));

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<head>
    <link href="cssfile.css" rel="stylesheet">
</head>

