<?php 

$f = fopen("notasalumnos.csv","r");

$aprobados = 0;
$suspensos = 0;
$asigBuscada="VL2";
//$asigBuscada=$_GET['asig'];

for($i=0; $i<=10; $i++){
    $notas[$i]=0;
}

while($linea=fgets($f)){
    list($alumno, $asig, $nota)=explode(",",trim($linea));

    if($asig==$asigBuscada){
        $notas[$nota]++;
    }
}

$total = $aprobados+$suspensos;
echo "<h2> Asignatura ".$asigBuscada."</h2>";
$total=array_sum($notas);
echo "<h3> Total alumnos evaluados: ".$total."</h3>";

foreach($notas as $nota=>$cant){
    echo "<li>Nota: ".$nota." Num. Alumnos: ".$cant;
}

?>