<?php
$user = 'root';
$password = '';

$db = new PDO('mysql:dbname=examen', $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<h2>Autobuses ALSA</h2>
<a class='btn btn-primary' href="alta.php">Alta de viaje</a>

<h3>Viajes Planificados</h3>

<?php
$query = $db->prepare("SELECT destino,fecha,plazas FROM viajes ORDER BY fecha");

$query->execute();

$result = $query->fetchAll(PDO::FETCH_OBJ);
echo "<pre>";

?>

<table border="1">

<?php
echo "<tr>";
?>

<tr>
    <td>Destino</td>
    <td>Fecha</td>
    <td>Plazas</td>
    <td>Compra</td>
</tr>

<?php

foreach ($result as $res){
    echo "<tr>";
        echo "<td > ".$res->destino."</td>";
        echo "<td style='text-align:center;'> ".$res->fecha."</td>";
        echo "<td style='text-align:center;'> ".$res->plazas."</td>";
        if($res->plazas > 0){
            echo "<td style='text-align:center;'><a href='alta.php'> VENDER </a></td>";
        }
        
    echo "</tr>";
}
?>

</table>
