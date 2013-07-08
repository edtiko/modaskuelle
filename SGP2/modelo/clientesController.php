<?php

include 'clientesModel.php';
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);

if(isset($_POST["sol"]))//se valida si la solicitud viene por GET
	$sol=$_POST["sol"];

	if(isset($_GET["sol"]))//se valida si la solicitud viene por POST
	$sol=$_GET["sol"];

if($sol=="eliminar"){
	$nroCliente=$_POST["nroPedido"];

	deleteCliente($nroCliente);
	}

if($sol=="modificar"){
    $date = date("Y-m-d");

     $cliente = new cliente($_POST["nombre"],$_POST["apellido"],$_POST["id"],$_POST["sexo"]
	,$_POST["tel"],$_POST["celular"],$_POST["ciudad"],$_POST["dir"],$_POST["digitadoR"]
	,$_POST["fechA"],$date,$_POST["nombre"].' '.$_POST["apellido"],$_POST["emp"]
	,$_POST["ob_r"]);


        updatePedido($cliente);
echo 'Actualizado Satisfactoriamente.';
	}
	
	if($sol=="registrar"){
	$cc=$_POST["cedula"];
	$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){
?>
<style type="text/css">

  #dato {

    position:absolute;
	width: 600px;
	height: 22px;
	left: 85px;
	top: 370px;
	color: #00529B;
	background-color: #BDE5F8;
	background-image: url(img/info.png);
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	
	margin: 10px 0px;
	padding:5px 5px 5px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;

}
</style>
<?php
    echo'El usuario ya existe en la base de datos. ';

}
else{
$x="0000-25-00";
	 $cliente = new cliente($_POST["nombre"],$_POST["apellido"],$_POST["cedula"],$_POST["sexo"]
	,$_POST["telefono"],$_POST["celular"],$_POST["ciudad"],$_POST["direccion"],$_POST["digitador"]	
	,$_POST["fechaE"],$x,$_POST["nombre"].' '.$_POST["apellido"],$_POST["empresa"]
	,$_POST["ob_reg"]);
	
    insertCliente($cliente);
	
	?>
	<style type="text/css">

  #dato {

    position:absolute;
	width: 600px;
	height: 22px;
	left: 85px;
	top: 370px;
	color: #00529B;
	background-color: #BDE5F8;
	background-image: url(img/exito.png);
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	margin: 10px 0px;
	padding:5px 5px 5px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;

}
</style>
<?php
echo " Ha sido registrado correctamente";
	}
	}

?>