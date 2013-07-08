<?php
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);

if (isset($_POST['cedula'])){
$q = $_POST['cedula'];


$sql = mysql_query("SELECT * FROM tbcliente WHERE id_cliente='$q';");

while($row = mysql_fetch_array($sql)){

 $arr = array ('nombre'=> $row['nombre_cliente'],'apellido'=> $row['apellido'],'ciudad'=>$row['ciudad'],'direccion'=>$row['direccion'],'fecha'=>$row['fecha_entrada'],
     'telefono'=>$row['telefono'],'celular'=>$row['celular'],'empresa'=>$row['empresa'],'observacion'=>$row['observacion'],'digitador'=>$row['digitador'],'sexo'=>$row['sexo'],'id'=>$row['id_cliente'],
     'cliente'=>$row['nombre_apellido']);

echo json_encode($arr);
  }
}


if (isset($_POST['nombre'])){
$q = $_POST['nombre'];


$sql = mysql_query("SELECT * FROM tbcliente WHERE nombre_apellido='$q';");

while($row = mysql_fetch_array($sql)){

 $arr = array ('nombre'=> $row['nombre_cliente'],'apellido'=> $row['apellido'],'ciudad'=>$row['ciudad'],'fecha'=>$row['fecha_entrada'],'direccion'=>$row['direccion'],
     'telefono'=>$row['telefono'],'celular'=>$row['celular'],'empresa'=>$row['empresa'],'observacion'=>$row['observacion'],'digitador'=>$row['digitador'],'sexo'=>$row['sexo'],'cedula'=>$row['id_cliente']);

echo json_encode($arr);
  }
}
if (isset($_POST['cedula_operario'])){
$q = $_POST['cedula_operario'];


$sql = mysql_query("SELECT * FROM operario WHERE CEDULA='$q';");

while($row = mysql_fetch_array($sql)){

 $arr = array ('nombre'=> $row['NOMBRE'].' '.$row['APELLIDO']);

echo json_encode($arr);
  }
}
if (isset($_POST['nombre_operario'])){
$q = $_POST['nombre_operario'];


$sql = mysql_query("SELECT * FROM operario WHERE CONCAT(NOMBRE, ' ', APELLIDO) like '%" . $q . "%'");

while($row = mysql_fetch_array($sql)){

 $arr = array ('cedula'=> $row['CEDULA']);

echo json_encode($arr);
  }
}
if (isset($_POST['busqueda'])){
$q = $_POST['busqueda'];


$sql = mysql_query("SELECT * FROM operario WHERE CONCAT(NOMBRE, ' ', APELLIDO) like '%" . $q . "%' or CEDULA like '%".$q."%'");

while($row = mysql_fetch_array($sql)){

 $arr = array ('cedula'=> $row['CEDULA'], 'nombre'=>$row['NOMBRE'].' '.$row['APELLIDO'], 'direccion'=>$row['DIRECCION'], 'barrio'=>$row['BARRIO'],'telefono'=>$row['TELEFONO']);

echo json_encode($arr);
  }
}

?>