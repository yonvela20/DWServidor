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
    <h2>Enhorabuena has ganado!</h2>
</div>
    
<div>
    <a href="index.php" type=button> Reiniciar </button>
    <?php 
        session_start();
        session_destroy();
    ?>
</div>
</body>
</html>