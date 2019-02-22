<?php 

/**
 * Este modelo de array esta mal ya que no puedes 
 * acceder al indice directamente 
 */
/* $categoria=[
    ["TV" => "Televisores"],
    ["TE" => "Telefonia"],
    ["LB" => "Linea Blanca"]
];
echo $categoria[0]["TV"]; //Televisores */

/**
 * De esta forma podemos acceder al valor del array 
 * mediantes su clave pero solo admite un valor 
 */
/* $categoria=[
    "TV" => "Televisores",
    "TE" => "Telefonia",
    "LB" => "Linea Blanca"
];
echo $categoria["TV"]; //Televisores */

/**
 * De esta forma podemos acceder al array mediante un 
 * indice pero ademas admitimos mas de un valor por indice 
 * haciendolo así una estructura de array más potente
 */
$categoria=[
    "TV" => ["nombre"=>"Televisores", "portada"=>"Si"],
    "TE" => ["nombre"=>"Telefonia", "portada"=>"Si"],
    "LB" => ["nombre"=>"Linea Blanca", "portada"=>"No "]
];

echo $categoria["TV"]["nombre"]; //Televisores
echo "<br>";
echo $categoria["TV"]["portada"]; //TV en portada? si/no
echo "<br>";

$articulos=[
    "tvLg" => ["nombre"=>"television Lg 40p", "categoria"=>$categoria["TV"]], 
    "tlfXia" => ["nombre"=>"xiaomi mi a1", "categoria"=>$categoria["TE"]] 
];

echo $articulos["tvLg"]["nombre"];
echo "<br>";
echo $articulos["tvLg"]["categoria"];
echo "<br>";
?>