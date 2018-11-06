<?php
require "init.php";
require "bbdd.php";
require "cabecera.php";
require "funciones.php";

if(!usuario()) die();

$cat=params("cat");

if($cat && !isset($categorias[$cat])) 
    die("");

$filtro=params("filtro");
?>

<form method=get >
Categoría:

<?php
desplegable("cat",$categorias,$cat);
?>
<input type="submit" value="Buscar">

</form>

<?php
if($cat) { // Si no se selecciona nada, no se muestran articulos
	if($cat) {
		echo "<h3>Categoría: ".$categorias[$cat].'</h3>';
                $listarticulos=$articulos; // Todos
        }
        
	foreach(getArticulos($cat,$filtro)  as  $id=>$art){

		printf('<div class="art"><b>%s</b><br>%d €<br><br>
			<a href="comprar.php?id=%s" class=boton>Añadir a carrito</a></div>',
				$art['titulo'],$art['precio'],$id);
	}
}
?>
