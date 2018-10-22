<?php
include "index.html";
//$f = open("LosPilares.txt", "r");

$fichero=[];

if(isset($_FILES) && isset($_FILES['fichero'])){
    $ruta=$_FILES['fichero']['tmp_name']; //ruta temporal donde está el fichero
    $nombre=$_FILES['fichero']['name'];
    move_uploaded_file($ruta, 'texts/'.$nombre);

    $f = file_get_contents('texts/'.$nombre);

$palabras = file_get_contents($f);

$values = preg_split("/[\s,]+/", utf8_encode($palabras), -1, PREG_SPLIT_NO_EMPTY);

rsort($values);

$frecuencia = []; 

foreach($values as $palabras){

    if(isset($frecuencia[$palabras])){
        $frecuencia[$palabras]++;
    }else{
        $frecuencia[$palabras]=1;
    }
}

?>

<table border=1><tr><th>Palabra</th><th>Frecuencia</th></tr>

<?php
foreach($frecuencia as $palabras=>$frecuencia){
    echo "<tr><td>".$palabras."</td>";
    echo "<td>".$frecuencia."</td></tr>";
}
}
?>