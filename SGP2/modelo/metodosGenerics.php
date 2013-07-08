<?php

include 'conexion.php';


function create_insert($tabla,$campos,$values){
$conn=conexDB();
$query="insert into ".$tabla."  ".$campos." values ".$values." ";
mysql_query($query,$conn);
}

function create_update($tabla,$campos,$condicion){
$conn=conexDB();
$query="update  ".$tabla."  set  " .$campos." where  ".$condicion." ";
mysql_query($query,$conn);
}

function create_query($tabla,$campo,$condicion){
$conn=conexDB();
$query="select ".$campo." from ".$tabla." where ".$condicion;
mysql_query($query,$conn);
}


function create_delete($tabla,$condicion){
$conn=conexDB();
$query="delete  from ".$tabla."  where  ".$condicion." ";

$q=mysql_query($query,$conn);
if($q){
    return true;
}
else return false;
}

function toHtml($entra){
$traduce=array( '�' => '&aacute;' , '�' => '&eacute;' , '�' => '&iacute;' , '�' => '&oacute;' , '�' => '%uacute;' , '�' => '&ntilde');
$sale=strtr( $entra , $traduce );
return $sale;
}

?>