<?php

if(!isset($_GET['tabla'])){
    die("No me toques los numeritos");
}

$tabla=$_GET['tabla'];

if(isset($_GET['numero']) && isset($_GET['resultado'])){
    $numero=$_GET['numero'];
    $resultado=$_GET['resultado'];
    if($numero*$tabla==$resultado){
        echo "<h3>correcto!</h3>";

    }else{
        echo "<h3>te has equivocado el resultado es $resultado</h3>";
    }
    echo "<a href='?tabla=$tabla'>Probar otro numero</a>";
    echo "<br><a href='index.php?tabla=$tabla'>Home</a>";
    
}else{
    echo "<h3>Te has equivocado prueba otra vez</h3>";
}
if(!isset($numero)){
    $numero=rand(1,9);
}
?>

<h3>Practicando la tabla del <?=$tabla?></h3>
<form>
    <?=$tabla?> x <?=$numero?> = <input name=resultado>
    
    <input type=submit value=Comprueba>
    <input type=hidden name=numero value=<?= $numero?>>
    <input type=hidden name=tabla value=<?= $tabla?>>

    
</form>
<?php 

?>