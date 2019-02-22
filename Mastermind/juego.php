<?php
require "mastermind.php";

session_start();
if(!isset($_SESSION['master'])){
    $mastermind = new Mastermind();
    $mastermind->inicioJuego();
    /**
     * De cara a corregir descomenta las lineas de abajo para
     * saber el numero a adivinar ya directamente 
     */
    //var_dump($mastermind->getRandom());
    $_SESSION['master']=$mastermind;

} else{
    $mastermind=$_SESSION['master'];
    //var_dump($mastermind->getRandom());    
} 