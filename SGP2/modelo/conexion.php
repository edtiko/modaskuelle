<?php
function conexDB(){

    if(!$conex=mysql_connect("localhost","root",""))
         echo "No se pudo Establecer la Conexion al Server";
    if(!mysql_select_db("modaskuelle",$conex))
		echo "No se pudo Seleccionar la base de datos " . mysql_error(); 
return $conex;
}

?>