<html> 
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<h2>Autobuses ALSA - Alta </h2>

<form method='POST'>
    <div class='col col-md-2'>
        <label for="destino">Destino</label>
        <input class='form-control' id="destino" name="destino" >
    </div>
    <div class='col col-md-2'>
        <label for="fecha">Fecha</label>
        <input  class='form-control' id="fecha" name="fecha" type="date">
    </div>
    <div class='col col-md-1'>
        <label for="plazas">Plazas</label>
        <input  class='form-control' id="plazas" name="plazas">
    </div>
    <div class='col col-md-2'><br>
        <input type=submit class="btn btn-primary" value="crear">
    </div>

</form>
<?php
$user = 'root';
$password = '';

$db = new PDO('mysql:dbname=examen', $user, $password);
/*** set the error reporting attribute ***/
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['crear'])){
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $plazas = $_POST['plazas'];
    
    $sql = "INSERT INTO viajes (destino, fecha, plazas)
    VALUES ($destino, $fecha, $plazas)";
    // use exec() because no results are returned

    if($db->exec($sql)){
        header("Location: index.php");
    } else{
        echo "<p>Algo ha ido mal</p>";
    }
}

$conn = null;

?>
</body>
</html>
