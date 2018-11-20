<?php 
//require "funciones.php";
class Mastermind{
    private $random = [];
    
    public $contadorIntentos = 0;
    public $contadorMuertos = 0;
    public $contadorHeridos = 0;

    public $numero;

    public $contador;

    //protected $errores = [];
   
    public function inicioJuego(){
        //generaRandom($this->random);
        $rndInicial = mt_rand(1, 6); 
        array_push($this->random, $rndInicial); //Metemos un primer random en el array

        for($i = 0; $i<3; $i++){
            $rnd = mt_rand(1, 6);
            if(in_array($rnd, $this->random)){ //Si está dentro del array $i-- 
                $i--;
            }else{
                array_push($this->random, $rnd); //Si no lo está lo metemos dentro
            }
        }
        return $this->random;
    }

    public function validar($numero, $random = [], $i){
        if($numero != $random[$i]){
            var_dump("Numero incorrecto!");
        } else {
            var_dump("Numero correcto!");
        }       
    }
}

