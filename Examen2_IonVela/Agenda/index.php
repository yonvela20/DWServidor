<?php
require 'init.php';

if(isset($_GET['mes']))
	$mes=$_GET['mes'];
else
	$mes=date('m');
?>
<html>
<head>


<title>Agenda</title>
<link rel="stylesheet" type="text/css" href="calendario.css" />
</head>
<body>
<h2>Agenda</h2>

<div>

<?php
echo "<a href='?mes=".($mes-1)."'>Mes anterior</a>";
?>
<br>
<?php
echo "<a href='?mes=".($mes+1)."'>Mes siguiente</a>";

?>
<br>
<a href="veranyo.php">Año completo</a>
</div>

<?php
$v=new viscalendario($calendario);
echo '<div class=mesgrande>';
$v->displaymes($mes);
echo '</div>';
?>


</body>
</html>


