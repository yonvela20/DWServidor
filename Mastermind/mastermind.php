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
    
    //Genera un array de cuatro valores aleatorios del 1 al 6 sin repeticiones 
    public function inicioJuego(){
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

    //Funcion provisional para el desarrollo
    public function getRandom(){
        return $this->random;
    }

    //Funcion que comprueba si la jugada esta hecha y si no comprueba cuantos numeros has acertado
    public function validar($numero){
        if(in_array($numero, $this->jugadas['num'])){
            //TODO: Aqui va la funcion de error que hay que hacer 
            var_dump("No puedes repetir jugada");
        } else{
            $this->compruebaNumero($numero);

            if($this->jugadas['muertos'] >= 4){
                //Aqui te debe redireccionar a una pagina de ganar, esto es provisional
                var_dump("Has ganado");
            }
            if($this->jugadas['muertos'] < 4){
                return "";
            }
        }
    }

    //Funcion que comprueba los numeros introducidos
    public function compruebaNumero($numero){
        //Estas dos lineas son de desarrollo se quitarán mas adelante
        var_dump("Numeros a validar: ");
        var_dump($numero);

        for($i = 0; $i < count($this->random); $i++){

            if(in_array($this->random[$i], $numero)){
                $this->jugadas['heridos']++;
                if($this->random[$i] == $numero[$i]){
                    $this->jugadas['muertos']++;
                    $this->jugadas['heridos']--;
                }
            }
        }
        
        array_push($this->jugadas['num'], $numero);
        $this->jugadas['intentos']++;
    }

    //Gettters y setters a cero
    public function getMuertos(){
        return $this->jugadas['muertos']; 
    }

    public function setMuertosCero(){
        $this->jugadas['muertos'] = 0; 
    }

    public function getHeridos(){
        return $this->jugadas['heridos'];
    }

    public function setHeridosCero(){
        $this->jugadas['heridos'] = 0;
    }

    public function getIntentos(){
        return $this->jugadas['intentos'];
    }

    public function getUltimaJugada(){
        $ultimaJugada = count($this->jugadas['num']) - 1;
        return array_slice($this->jugadas['num'], $ultimaJugada);
    }
}

