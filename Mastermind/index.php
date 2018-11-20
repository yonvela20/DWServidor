<?php 
require "mastermind.php";
require "vista.php";

session_start();

$mastermind = new Mastermind();
$rnd = $mastermind->inicioJuego();

if(!isset($_SESSION['numRandom'])){
    $rnd = $_SESSION['numRandom'];
}

var_dump($_SESSION['numRandom']);

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];
$num4 = $_POST['num4'];

if(isset($num1)){
    var_dump($num1);
    $mastermind->validar($num1, $_SESSION['numRandom'], 0);
}
if(isset($num2)){
    var_dump($num2);
    $mastermind->validar($num2, $_SESSION['numRandom'], 1);
}
if(isset($num3)){
    var_dump($num3);
    $mastermind->validar($num3, $_SESSION['numRandom'], 2);
}
if(isset($num4)){
    var_dump($num4);
    $mastermind->validar($num4, $_SESSION['numRandom'], 3);
}






