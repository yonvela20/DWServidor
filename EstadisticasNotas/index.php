<?php 

$f = fopen("notasalumnos.csv","r");

$aprobados = 0;
$suspensos = 0;
$asigBuscada="VL2";


while($linea=fgets($f)){
    list($alumno, $asig, $nota)=explode(",",trim($linea));

    if($asig==$asigBuscada){
        if($nota >= 5){
            $aprobados++;
        } else{
            $suspensos++;
        }
    }
}

$total = $aprobados+$suspensos;
echo "<h3> Asignatura ".$asigBuscada."</h3>";
echo "<li> Total aprobados ".$aprobados. " ".round($aprobados/$total*100)." %";
echo "<li> Total suspendidos ".$suspensos. " ".round($suspensos/$total*100)." %";