<?php

$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);

if (isset($_POST['nombre']) && ($_POST['celular']) ){

$nom = $_POST["nombre"];
$ape = $_POST["apellido"];
$cc = $_POST["cedula"];
$tel = $_POST["telefono"];
$cel = $_POST["celular"];
$se = $_POST["sexo"];
$ci= $_POST["ciudad"];
$dir= $_POST["direccion"];
$dig= $_POST["digitador"];
$fec= $_POST["fecha"];


$consulta=mysql_query("SELECT id_cliente FROM tbcliente WHERE id_cliente='$cc';");
$row=mysql_fetch_array($consulta);
if($row['id_cliente']==$cc){
?>
<style type="text/css">

  #dato {

    position:absolute;
	width: 300px;
	height: 22px;
	left: 85px;
	top: 225px;
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

   $query = "INSERT INTO tbcliente  VALUES ('$nom', '$ape', '$cc', '$se', '$tel', '$cel', '$ci', '$dir', '$dig', '$fec','$null','$nom $ape');";

if(mysql_query($query))
{
    ?>
<style type="text/css">

  #dato {

    position:absolute;
	width: 300px;
	height: 22px;
	left: 85px;
	top: 225px;
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
?>

<?php
}
                        }}

                        else
{
echo "X ERROR: FALLO AL REGISTRAR ";
}


?>
