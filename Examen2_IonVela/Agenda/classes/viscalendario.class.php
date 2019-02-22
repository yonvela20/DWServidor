<?php
/** Visualiza el mes de una instancia calendario, con sus citas
 */

class viscalendario{
	public $calendario;

	public function __construct($calendario){
		setlocale(LC_ALL, 'spanish');
		$this->calendario=$calendario;
	}

	private function displaydia($mes,$dia){
		echo "<div class='dia'><a href=citasdia.php?dia=$dia&mes=$mes>$dia</a>\n";
		$citas=$this->calendario->getcitasdia($mes,$dia);
		if($citas) 
			foreach($citas as $hora=>$paciente)
				printf("<div class=cita style='font-size:10px'>%s %s</div>",
						$hora,$paciente);
		echo "</div>\n";
	}

	// Muestra un día. De color negro si no hay citas, rojo si las hay
	private function displaydiaresum($mes,$dia){
		//TODO
		
		
	}

	/**  Muestra el calendario
	 * 
	 * @param type $mes Mes a mostrar
	 * @param type $resum Si es true, No se muestran las citas dentro de cada día:
	 *			Únicamente si hay citas o no (color rojo o negro)
	 */

	public function displaymes($mes,$resum=false){

		echo "<div class=calmes><div class=titmes>";
		echo "Mes ".$this->nombreMes($mes);
		echo "</div>";

		//cabecera de dias
		$cabecera=array('L','M','X','J','V','S','D');
		foreach($cabecera as $c)
			echo "<div class='dia titdia'>".$c.'</div>';
		echo "<div class=clear></div>";

		// Dias vacíos hasta el anterior del día 1
		$diasem1=$this->calendario->diasemana($mes,1);
		for($i=1;$i<$diasem1;$i++)
				echo "<div class='dia vacio'></div>";


		$diasmes=cal_days_in_month ( 0 , $mes , $this->calendario->anyo);
		for($dia=1;$dia<=$diasmes;$dia++){
			if(!$resum)
				$this->displaydia($mes,$dia);
			else
				$this->displaydiaresum($mes,$dia);
		}

		echo "</div></div>";
	}

	//Un array con todos los meses el cual devuelve el indice del mes que le pases por parametro
	public function nombreMes($numMes){
		$arrayMeses = ['enero', 'febrero', 'marzo', 
						'abril', 'mayo', 'junio', 
						'julio', 'agosto', 'septiembre', 
						'octubre', 'noviembre', 'diciembre'];
		return $arrayMeses[$numMes-1];
	}
	
	//Un for que recorre todos los años (12) y te los muestra pero utilizando la clase mespeq
	public function displayAnyo(){
		//TODO
		for($i = 1; $i<=12; $i++) {
			echo "<div class='mespeq'>";
			$this->displaymes($i, false);
			echo "</div>";
		}
	}

}

?>



