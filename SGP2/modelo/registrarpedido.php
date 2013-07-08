<?php
$bd="modaskuelle";
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);

// Comprobamos si el nombre de usuario o la cuenta de correo ya existÃ­an

$codorden = $_POST["codigo"];
$nombre = $_POST["nombre"];
$apell = $_POST["apellido"];
$codcli = $_POST["codcliente"];
$tel = $_POST["telefono"];
$fecharec = $_POST["datepicker1"];
$fechaent = $_POST["datepicker2"];
$area = $_POST["area"];
$est = $_POST["estado"];
$art = $_POST["articulo"];
$serv = $_POST["servicio"];
$total = $_POST["total"];
$abono = $_POST["abono"];
$saldo = $_POST["saldo"];

$consulta=mysql_query("SELECT codigo_cliente FROM tbcliente WHERE codigo_cliente='$codcli'");
$existe = mysql_num_rows($consulta);
			if ($existe<=0) {

echo'El Cliente no existe registrelo primero';
}
 else {


$query = "INSERT INTO tbpedido (codigo_orden,nombre_cliente,apellido_cliente,codigo_cliente,telefono,fecharecibido,fechaentrega,area_produccion,estado,articulo,servicio,total,abono,saldo)  VALUES ('$codorden', '$nombre','$apell','$codcli','$tel','$fecharec','$fechaent','$area','$est','$art','$serv','$total','$abono','$saldo');" ;


if(mysql_query($query))
{

echo "Pedido Registrado Correctamente". mysql_error() ;

}
else
{
echo "X ERROR: Fallo al registrar Pedido : ". mysql_error() ;
}
 }
?>
