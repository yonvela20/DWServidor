<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>Upload</title>
</head>
<?php
define('MAX_FILES', 3);
$names = [];
$tmp_names = [];
$errors = [];

if (isset($_FILES['img'])) {
    var_dump($_FILES['img']);
    for ($i = 0; $i<MAX_FILES;$i++) {
        if ($_FILES['img']['error'][$i] == 0) {
            $names[$i] = $_FILES['img']['name'][$i];
            $tmp_names[$i] = $_FILES['img']['tmp_name'][$i];
            while (is_writable('img/'.$names[$i])) {
                $names[$i] = 'copia'+$names[$i];
            }
            move_uploaded_file($tmp_names[$i], 'img/'.$names[$i]);
        }
    }
    header('Location: '.'index.php');
    die;
}
include "main.html";
?>
<body>
<h1> Galeria de imágenes </h1>
<div>
    <div>
        <form method="POST" class="upload-form " enctype="multipart/form-data">
            <?php
                for($i = 0;$i<MAX_FILES;$i++) {
                    echo "<br>";
                    echo "<div><div><input type='file' name='img[]'></div></div>";
                }
                echo "<br><br>";
            ?>
            <input type="submit" class="btn" name="enviar" value="Enviar">
        </form>
    </div>
</div>
    
</body>
</html>