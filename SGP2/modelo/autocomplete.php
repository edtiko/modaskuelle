<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);

$q = $_GET['term'];

$sql = mysql_query("SELECT * FROM tbcliente WHERE id_cliente LIKE '%$q%'");

while($row = mysql_fetch_array($sql,MYSQLI_ASSOC)){

 $arr = array ('nombre'=> $row['id_cliente'].''.$row['nombre_cliente']);

 echo json_encode($_GET['term']);
  }

?>
