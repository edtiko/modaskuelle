<?php

include 'metodosGenerics.php';

	$prenda=$_POST["prenda"];
	$cliente=$_POST['cedula'];
	

	create_delete($prenda,"id_cliente='".$cliente."'");
	echo 'La prenda se eliminó';
	

?>