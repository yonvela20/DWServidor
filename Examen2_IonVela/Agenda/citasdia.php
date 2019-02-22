<?php
/*  Solicita datos para añadir una cita a un dia-hora
 * Parámetros GETs: dia y mes de la cita.
 */
require "init.php";

if(!isset($_GET['dia']) || !isset($_GET['mes']))
	die ("Error de ejecución");
$dia=$_GET['dia'];
$mes=$_GET['mes'];
$anyo=$calendario->anyo;

if(isset($_POST['crear'])){ //venimos del post del formulario. Creamos la cita y volvemos a ver el calendario del mes actual
	//TODO

	//Recogemos el paciente y la hora ya que el dia y el mes ya estan y llamamos la funcion anadircita con estos parametros 
	//Luego volvemos al indice 
	$paciente = $_POST['paciente'];
	$hora = $_POST['hora'];
	
	$calendario->anadircita($mes,$dia,$hora,$paciente);
	
	header("Location: index.php?mes=$_GET[mes]");

} else {
	$paciente="";
	$hora="";
}

?>
<html>
<head>
<title>Agenda</title>
<link rel="stylesheet" type="text/css" href="calendario.css" />
</head>
<body><div class="formcita">
<h3>Crear cita</h3>
Fecha: <?php echo "$dia/$mes/$anyo"; ?><p>
<form method=post >
	
	Hora:<br><select name=hora> <option value="..."></option>
		<?php foreach($calendario->gethoras("16:00","20:30") as $h) {
			echo "<option value='$h'>$h</option>";
		}
		?>
	</select><p>

Paciente:<br>
<input name=paciente size=50 value="<?=$paciente ?>">
<p>
<input type=submit name=crear value="Crear cita">

</form>
</div>
	<h3>Citas este día</h3>	
<?php
$citas=$calendario->getcitasdia($mes,$dia);
		if($citas) 
			foreach($citas as $hora=>$paciente)
				printf("<li>%s %s <a href='anulacita.php?dia=%d&mes=%d&hora=%s'>Anular</a>",$hora,$paciente,$dia,$mes,$hora);	
?>		
</body>
</html>


