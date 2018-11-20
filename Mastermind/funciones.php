<?php 
//Funciones 
function generaRandom($random = []){
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
    return $random;
}
?>