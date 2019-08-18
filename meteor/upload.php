<? session_start(); ?>
<body>
<form action="index.php">
    <h1>Ваши изображения <input type="submit" class="down" value="Выход"></h1>
</form>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image" required/>
    <input type="submit" class="down" value="Загрузить" name="btn"/>
</form>

<?
include_once('store_image.php');
?>

</body>
