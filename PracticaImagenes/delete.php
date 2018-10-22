<?php

$imagesToDelete;

include "main.html";
require_once "ficheros.php";

if (isset($_POST['encodedImgPaths'])) {
    $imagesToDelete = explode(',,', $_POST['encodedImgPaths']);
    foreach($imagesToDelete as $imageToDelete) {
        $realPath = realpath("img/$imageToDelete");
        if (is_writable($realPath)) {
            unlink($realPath);
        }
    }
}

if (!isset($_POST['deleteImg']) || isset($_POST['encodedImgPaths'])) {
    header('Location: '.'index.php');
    die;
}

if (isset($_POST['encodedImgPaths'])) {
    $imagesToDelete = unserialize($_POST['encodedImgPaths']);
    foreach($imagesToDelete as $imageToDelete) {
        $realPath = realpath("images/$imageToDelete");
        if (is_writable($realPath)) {
            unlink($realPath);
        }
    }
    header('Location: '.'index.php');
    die;
}
$imagesToDelete = $_POST['deleteImg'];
?>

<div>
    <?php
    mostrarImagenes($imagesToDelete, false);
    
    ?>
    <div>
        <h2>Quieres borrar <?=count($imagesToDelete)>1?"estas ".count($imagesToDelete)." imagenes?": ""?></h2>
    </div>
    <div>
        <form method="post">
            <input type="hidden" name="encodedImgPaths" value="<?= implode(',,', $imagesToDelete)?>">
            <div>
                <input type="submit" value="Borrar" name="del">
                <button><a href="index.php">Volver</a></button>
            </div>
        </form>
    </div>
</div>