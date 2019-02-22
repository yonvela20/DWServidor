<?php 
require "persona.class.php";

class alumno extends persona{
    public $curso;
}

$usuario = new persona("Pepe", "Garcia");

/* $usuario->nombre = "Pepe";
$usuario->apellido = "Garcia"; */

echo $usuario->nombreCompleto();
echo " ".$usuario->edad = 80; 

$usuario->sexo="M";

echo $usuario->sexoText();

$alu = new alumno("Juan", "Rodriguez");
$alu->curso="2DAW";

echo $alu->curso;