<?php
//defino una clase que voy a utilizar para generar los elementos sugeridos en autocompletar
class ElementoAutocompletar {
   var $value;
   var $label;

   function __construct($label, $value){
      $this->label = $label;
      $this->value = $value;
   }
}

//recibo el dato que deseo buscar sugerencias
$datoBuscar = $_GET["term"];

//conecto con una base de datos
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("modaskuelle");

//busco un valor aproximado al dato escrito
$ssql = "select * from operario where nombre like '%" . $datoBuscar . "%' or APELLIDO like '%".$datoBuscar."%'";
$rs = mysql_query($ssql);

//creo el array de los elementos sugeridos
$arrayElementos = array();

//bucle para meter todas las sugerencias de autocompletar en el array
while ($fila = mysql_fetch_array($rs)){
   array_push($arrayElementos, new ElementoAutocompletar(utf8_encode($fila["NOMBRE"].' '.$fila['APELLIDO']), $fila["NOMBRE"].' '.$fila['APELLIDO']));
}

print_r(json_encode($arrayElementos));
?>
