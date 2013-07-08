<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);

if (isset($_POST['ced'])){


    $cc=$_POST['ced'];

    $query=mysql_query("SELECT nombre_cliente,apellido FROM tbcliente WHERE id_cliente= '$cc';");

    $row=mysql_fetch_assoc($query);

    echo $row['nombre_cliente'].' '.$row['apellido'];
}

?>
