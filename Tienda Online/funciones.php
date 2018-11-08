<?php 
require "bbdd.php";
//Funcion a la que le paso el parametros de la "bbdd" para hacer busquedas de 
//forma mas comoda
function params($param,$valdefecto=""){
    /**
     * $_REQUEST Junta el GET, POST y las cookies así en el index puedo 
     * hacer que me salgan los productos en el mismo indice mediante GET 
     * y cuando compro algo me lleva a la pantalla de compra mediante post 
     */
    if(isset($_REQUEST[$param]))
		return $_REQUEST[$param];
	else
		return $valdefecto;
}

/**
 * Funcion para rellenar el desplegable 
 */
function desplegable($name,$lista,$valorselecc){
	echo "<select name='$name'>";
	echo "<option value=''>Todo</option>";
	foreach($lista as $valor=>$descri){
        $selected=$valor==$valorselecc ? "selected" :"";
		echo "<option $selected value='$valor'>$descri</option>";
	}
	echo "</select>";
}

/**
 * Con esta funcion consigo todos los articulos para que me aparezcan en el index
 * cuando selecciono una categoria. 
 */
function getArticulos($cat='',$nombre=''){
    global $articulos;
    if(!$cat && !$nombre)
        return $articulos;
    else {
        $arts=[];
        foreach($articulos as $id=>$art){
            if($cat && $art['cat']!=$cat) 
                continue;
            if($nombre && strpos($art['titulo'],$nombre)===false) 
                continue;
            $arts[$id]=$art;
        }
        return $arts;
    }
}

/**
 * Funcion para cuando clicko en comprar para que me apareza 
 * el unico articulo seleccionado
 */
function getArticulo($id){
    global $articulos;
    if(!isset($articulos[$id]))
        return false;
    else
        return $articulos[$id];
}

?>