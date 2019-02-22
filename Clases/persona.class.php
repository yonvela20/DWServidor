<?php
class persona{
    public $nombre;
    public $apellido;
    private $edad;
    private $sexo;

    const MAXEDAD=120;
    static $generos=['H' => 'Hombre', 'M' => 'Mujer'];

    public function __construct($nombre, $apellido){
        $this->nombre = $nombre;
        $this->apellido = $apellido;

    }

    public function __set($prop, $valor){
        switch($prop){
            case "edad":
                if($prop=="edad"){ //if(isset($this->prop))
                    if($valor<0 or $valor>self::MAXEDAD){
                        die(" Error: edad incorrecta");
                    }else{
                        $this->edad = $valor;
                    }
                }
                break;
            
            case "sexo":
                if(!isset(self::$generos[$valor])){
                    die("Sexo incorrecto");
                }
                break;
        
            default:
                die("Error: No se puede asignar $prop");
                break;
        }
    }

    public function __get($prop){

        if($prop == "edad"){
            return $this->edad;
        }else{
            die("No existe la propiedad $prop");
        }
        
    }

    public function nombreCompleto(){
        return $this->nombre." ".$this->apellido; 
    }

    public function sexoText(){
        if($this->generos['H']){
            return "Masculino";
        }

        if($this->generos['M'])
            return "Femenino";
    }
}