<?php
//iniciamos la sesion
session_start();
//comprobamos que el input tenga algo, en el caso de que tenga 
if(isset($_POST['numprobadores'])){
	/** 
	 * le asignamos el valor del input para que se lo lleve a a 
	 * la otra pantalla mediante el POST pero teniendo en 
	 * cuenta la sesion
	 */
	$_SESSION['numprobadores']=$_POST['numprobadores'];
	for($i=1;$i<=$_POST['numprobadores'];$i++){
		$_SESSION['probador'][$i]=0;
	}
	//cambiamos a probador php al darle al submit
	header('Location:probador.php');
}

?>
<html>
<body>
<h2>Control de Probadores</h2>
<form method="POST"> 
	Número de probadores: 
	<input name=numprobadores size=2 type="number">
	<input type=submit name="enviar" value=Enviar>
</form>
</body>
</html>
