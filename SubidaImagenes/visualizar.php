<?php

$ruta = "./imagenes"; // Ruta de los archivos
$archivos = opendir($ruta); // Abrir archivos

while ($file = readdir($archivos)) {
echo $file;
?>
<html>
<img src="<?php echo $ruta.'/'.$file ?>"><br><br>    
</html>
<?php
} 
 
closedir($archivos); // Fin lectura archivos
?>


