<html>
    <head>
        <style>
            body{font-face:Verdana}
            .probador {font-size:1.2em;padding:10px;margin:8px;background:#44f;float:left;width:120px;height:140px;color:white}
            .prendas {font-size:3em;padding:10px;}
            .accion{font-weight:bold; background-color:#bbb;border:1px solid;width:20px;height:20px;margin:4px;padding:3px;color:blue}
            .accion a{text-decoration:none}
        </style>
    </head>
    <body>
        <h2>PROBADORES</h2>
        <?php 
            if(isset($error)) echo $error; //El error de probador.php
        ?>
        <table border="1"><tr><th>Probador</th><th>Prendas</th></tr>
        <?php 
        //De esta forma cada probador tiene un numero identificativo
        foreach($_SESSION['probador'] as $n=>$numero){
            echo "<tr><td>Probador $n</td><td>$numero</td><td>";
            echo "<span class=accion><a href='?accion=s&p=$n'> + </a></span>";
            echo "<span class=accion><a href='?accion=r&p=$n'> - </a></span>";
            echo "<span class=accion><a href='?accion=v&p=$n'> Vaciar probador </a></span>";
            echo "</td></tr>";
        }
        ?>
        </table>
        <hr>
        <span class=accion><a href="?accion=x"> Vaciar todo </a></span>
	</body>
</html>
