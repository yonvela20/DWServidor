<?php 

$f = fopen("notasalumnos.csv","r");

$nota=0;

$resultados=[];

while($linea=fgets($f)){
    list($alumno, $asig, $nota)=explode(",",trim($linea));
   
    if(!isset($resultados[$asig])){
        $resultados[$asig]=[0,0];
    }

    if($nota >= 5){
        $resultados[$asig][0]++;
    }else{
        $resultados[$asig][1]++;
    }
}


echo "<h2> Suspendidos y aprobados </h2>"; 

?>

<table border=1><tr><th>Asignatura</th><th>Aprobados</th><th>Suspendidos</th></tr>

<?php 

foreach($resultados as $asig=>$resultados){
    echo "<tr><td>".$asig."</td>"; 
    echo "<td>".$resultados[0]."</td>";
    echo "<td>".$resultados[1]."</td>";
    echo "</tr>";
}


?>