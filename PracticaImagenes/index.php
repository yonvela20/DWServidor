<?php
$image_dir = "img";
$images;
$hayImagenes;
require_once "ficheros.php";

if (scandir($image_dir)) {
    $images = array_diff(scandir($image_dir), array('..', '.'));
    sort($images);
}

include "main.html";
?>

<div>
    <form method="post" action="delete.php">
        <br>
        <br>
        <?php
            mostrarImagenes($images);
        ?>

        <div>
            <?php
                if (count($images)>0) {
                    echo '<input type="submit" value="Borrar" name="enviar">';
                } else {
                    echo '<button><a href="upload.php">Subir imagen</a></button>';
                }
            ?> 
        </div>
    </form>
</div>
