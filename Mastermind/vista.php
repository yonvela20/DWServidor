<?php 
require "juego.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mastermind</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<h1> Mastermind </h1>

<form method="POST">
    <input type="number" name="num[]">
    <input type="number" name="num[]">
    <input type="number" name="num[]">
    <input type="number" name="num[]">
    <input type="submit" value="submit">
</form>
    
<?php 
if($mastermind->getIntentos() < 5){

    if(isset($_POST['num'])){
        $num = $_POST['num'];
        echo "<p> Jugada anterior: ";
        
        foreach($_POST['num'] as $intento){
            echo $intento." ";
            $intento += $intento;
        }
        
        echo "</p>";
        $mastermind->validar($num);
    }
}

echo "<p><b>Muertos:</b> ".$mastermind->getMuertos()." <b>Heridos: </b>".$mastermind->getHeridos()." <b>Intentos: </b>".$mastermind->getIntentos()."</p>";

$mastermind->setMuertosCero();
$mastermind->setHeridosCero();
?>
    
</body>
</html>