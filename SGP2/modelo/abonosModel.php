<?php
error_reporting(0);
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);


function listAbonos(){

  include  'PHPPaging.lib.php';
  $paging = new PHPPaging;
$sql= "select a.NRO_PEDIDO, a.CLIENTE, b.id_cliente, b.nombre_apellido, c.* from tbpedido a JOIN tbcliente b JOIN abonos c ON c.NRO_PEDIDO= a.NRO_PEDIDO and b.id_cliente=a.CLIENTE ";

if ($_POST['type']=="campo"){
if ($_POST['busqueda']!=''){
    if ($_POST['criterio']=="cliente"){
        $sql .= " where b.nombre_apellido like '%".$_POST['busqueda']."%' or a.CLIENTE like '%".$_POST['busqueda']."%'";
    }
    else{
	$sql .= " where a.NRO_PEDIDO  like '%".$_POST['busqueda']."%'";
            }
}
}
else
if ($_GET['type']=="campo"){
if ($_GET['busqueda']!=''){
    if ($_POST['criterio']=="cliente"){
        $sql .= " where b.nombre_apellido like '%".$_GET['busqueda']."%' or a.CLIENTE like '%".$_GET['busqueda']."%'";
    }
    else{
	$sql .= " where a.NRO_PEDIDO  like '%".$_GET['busqueda']."%'";
            }
}
}
if ($_POST['type']=="lista"){
    $sql .= " where ".$_POST['criterio']."  like '%".$_POST['cr']."%'";
}
else
    if ($_GET['type']=="lista"){
    $sql .= " where ".$_GET['criterio']."  like '%".$_GET['cr']."%'";
}
  if (($_POST['fechauno']!='')&&($_POST['fechados']!='')){
             $fecha1=$_POST['fechauno'];
             $fecha2=$_POST['fechados'];
		$sql .= " AND c.FECHA_ABONO BETWEEN '$fecha1' AND '$fecha2'";
	}
 else
     if (($_GET['fechauno']!='')&&($_GET['fechados']!='')){
             $fecha1=$_GET['fechauno'];
             $fecha2=$_GET['fechados'];
		$sql .= " AND c.FECHA_ABONO BETWEEN '$fecha1' AND '$fecha2'";
	}

$paging->porPagina=10;
$paging->agregarConsulta($sql);
$paging->div('conte');
$paging->modo('desarrollo');
$paging->verPost(true);
$paging->ejecutar();
?>
<table width='900' class='table' border='0px'>
    <thead>
        <th>Pedido No.</th>
        <th>Cliente</th>
        <th>Fecha Abono</th>
        <th>Forma de Pago</th>
         <th>Abono</th>
           <th></th>
             <th></th>
    </thead>
      <tbody id="bodyon">
<?php
while($res = $paging->fetchResultado()){
    echo"<tr><td>".$res['NRO_PEDIDO']."</td>";
    echo"<td>".$res['nombre_apellido']."</td>";
    echo"<td>".$res['FECHA_ABONO']."</td>";
    echo"<td>".$res['FORMA_PAGO']."</td>";
    echo"<td>".$res['ABONO']."</td>";
     echo("<td> <a href='javascript:editAbono(".$res['ID_ABONO'].");' title='Editar Abono'><img src='img/page_edit.png' /></a></td>");
     echo("<td><a href='javascript: quitarAbono(".$res['ID_ABONO'].");' title='Quitar Abono'><img  alt='preview' src='img/delete.png'></a></td></tr>");
}

?>
      </tbody>
</table>
 <div id='bg' style='width:900px'>
    <table class='table' width='900px' border='0' >
    <thead>
        <tr>
    <th colspan='14' class='null' style='color:#15428B;' align='center'>
<?php
echo "<b>Navegaci&oacute;n</b>: ".$paging->fetchNavegacion();
 echo "</th></tr></thead></table></div>";
}
?>