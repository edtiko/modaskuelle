<?php
session_start();
$bd="podmusix";
$conexion=mysql_connect('localhost','root');
mysql_select_db($bd, $conexion);

if (isset($_POST["usuario"])) {
$user = $_POST["usuario"];
$pass = $_POST["contraseña"];
$nueva = $_POST["nueva"];
$email = $_POST["email"];

	$sql = mysql_query('SELECT password FROM usuarios WHERE password="'.$pass.'"');
	if($f== mysql_fetch_array($sql)){
		if($f["password"] == $pass){
$sql2 = "UPDATE usuarios SET usuario='$user', email ='$email',password='$nueva' WHERE password = '$pass'";
if(mysql_query($sql2))
{

echo "Cambios Efectuados". mysql_error() ;}
        }
}
else{
    echo "X ERROR: contraseña anterior incorrecta". mysql_error() ;
}
}
?>
