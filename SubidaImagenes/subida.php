<?php 
$fichero=[];

if(isset($_FILES) && isset($_FILES['fichero'])){
    $ruta=$_FILES['fichero']['tmp_name']; //ruta temporal donde está el fichero
    //echo file_get_contents($ruta);
    $nombre=$_FILES['fichero']['name'];
    move_uploaded_file($ruta, 'imagenes/'.$nombre);
}
?>
<div id="envio">
    <form method="post" enctype="multipart/form-data">
        <input id="examinar" type="file" name="fichero">
        <input id="subir" type="submit" value="Enviar" name="enviar">
    </form>
</div>