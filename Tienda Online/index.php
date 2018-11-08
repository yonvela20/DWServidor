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
if($cat) {
	echo "<h3>Categoría: ".$categorias[$cat].'</h3>';
			$listarticulos=$articulos; // Todos
	}
	
foreach(getArticulos($cat,$filtro)  as  $id=>$art){
	printf('<div class="art"><b>'.$art['titulo'].'</b><br>'.$art['precio'].'€<br>
		<a href="comprar.php?id='.$id.'" class=boton>Añadir a carrito</a><br><br></div>');
}
?>
