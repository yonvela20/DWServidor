<?php 
//require "funciones.php";
//El numero debe de ser privado pero por el momento lo dejo en publico así puedo verlo

class Mastermind{
    private $random = [];
    
    public $jugadas = [
        'num' => [],
        'heridos' => 0, 
        'muertos' => 0, 
        'intentos' => 0
    ];

    public $numero;
   
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
        var_dump($this->random);
    }

    public function validar($numero){
        var_dump("Numeros a validar: ");
        var_dump($numero);

        for($i = 0; $i < count($this->random); $i++){
            
            array_push($this->jugadas['num'], $numero);
            
            if($this->random[$i] == $numero[$i]){
                $this->jugadas['muertos']++;
                var_dump("El ".$i." es correcto");
            }
        }

        $this->jugadas['intentos']++;

        var_dump($this->jugadas['muertos']);
        var_dump($this->jugadas['intentos']);
    }
}

