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
</head>
<body>
<h1> Mastermind </h1>

<div>
    <h2>Lo siento has perdido...</h2>
    <h3> El numero a validar era: </h3>
    <?php
    $aleatorio = $mastermind->getRandom();
    foreach($aleatorio as $cifra){
        echo $cifra;
    }
    ?>
</div>
<br>
<div>
    <a href="index.php" type=button> Reiniciar </button>
    <?php 
        session_destroy();
    ?>
</div>
</body>
</html>