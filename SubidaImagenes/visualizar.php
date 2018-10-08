<?php

$ruta = "./imagenes"; // Indicar ruta
$filehandle = opendir($ruta); // Abrir archivos

while ($file = readdir($filehandle)) {

?>
<img src="<?php echo $ruta.$file ?>"><br><br>    

<?php
} 
 
closedir($filehandle); // Fin lectura archivos
?>


