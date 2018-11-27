<?php 
require "mastermind.php";

session_start();

if(!isset($_SESSION['master'])){
    $mastermind = new Mastermind();
    $mastermind->inicioJuego();
    var_dump($mastermind->getRandom());
    $_SESSION['master']=$mastermind;
} else{
    $mastermind=$_SESSION['master'];
    var_dump($mastermind->getRandom());
} 

if(isset($_POST['num'])){
    $num = $_POST['num'];
    $mastermind->validar($num);
}

var_dump("Muertos: ".$mastermind->getMuertos());
var_dump("Heridos: ".$mastermind->getHeridos());
var_dump("Intentos: ".$mastermind->getIntentos());
var_dump("Ultima jugada: ".$mastermind->getUltimaJugada());

$mastermind->setMuertosCero();
$mastermind->setHeridosCero();

require "vista.php";




