<?php 

$f = fopen("notasalumnos.csv","r");

$nota=0;

$asigAprobados=[];
$asigSuspensos=[];
//$asigBuscada=$_GET['asig'];

while($linea=fgets($f)){
    list($alumno, $asig, $nota)=explode(",",trim($linea));
   
    if($nota >= 5){
        if(isset($asigAprobados[$asig]))
            $asigAprobados[$asig]++;
        else
            $asigAprobados[$asig] = 1;
    }else{
        if(isset($asigSuspensos[$asig]))
            $asigSuspensos[$asig]++;
        else
            $asigSuspensos[$asig] = 1;
    }
}

echo "<h2> Suspendidos y aprobados </h2>"; 


/* foreach($asigSuspensos as $asig=>$cant){
    echo "<li> Asignatura: ".$asig." Suspendidos: ".$asigSuspensos[$asig];
}
 */
?>

<table border=1><tr><th>Asignatura</th><th>Aprobados</th><th>Suspendidos</th></tr>

<?php 

ksort($asigAprobados);

foreach($asigAprobados as $asig=>$cant){
    echo "<tr><td>".$asig."</td> <td>".$cant."</td>";
    if(isset($asigSuspensos[$asig])){
        echo "<td>".$asigSuspensos[$asig]."</td>";
    }else{
        echo "<td>0</td>";
        echo "</tr>";
    }
}

foreach($asigSuspensos as $asig=>$cant){
    if(isset($asigAprobados[$asig])){
        echo "<tr><td>".$asig."</td> <td>".$cant."</td></tr>";
    }
}

?>