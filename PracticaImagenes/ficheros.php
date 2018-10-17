<?php
function mostrarImagenes($imgArr, $delete = true) {
    echo "<br>";
    echo '<div class="row justify-content-center" id="imgContainer">';
    foreach ($imgArr as $image) {
        echo "<div style='width: 200px'>
            <img src='img/$image'>";
        if ($delete) {
            echo "<div>
            <input type='checkbox' name='deleteImg[]' value='$image'></div>";
        }
        echo "</div>";
    }
    echo "</div>";
}
?>