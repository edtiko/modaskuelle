<?php
session_start();
 if (isset($_POST['deta']) || isset($_GET['deta'])){
     ?>
<style>
   #tbodyon, tr:hover .h{
	background-color:#D0E3EF;
}
#ped, tr:hover td{
	background-color: transparent;
}
</style>
<?php
 }
 else {
?>
<style>
    #tbodyon, tr:hover .h{
	background-color:#D0E3EF;
}
#ped, tr:hover td{
	background-color: transparent;
}
/*.tab_container{
	border: 1px solid #999;
	border-top: none;
	overflow: hidden;
	clear: both;
	float: left;
	width: 820px;
	background: #fff;
	position:absolute;
	left: 50px;
	top: 37px;
	height: 800px;
	font-size:12px;
	-moz-border-radius:7px;
	-webkit-border-radius:7px;
}
        #content_wrapper{
	width:992px;
	height:895px;
	background-color:#ccc;
	margin:0px;
	padding:6px;
	overflow:hidden;
	position:absolute;
	left: 0px;
	top: 37px;
	-moz-border-radius: 0px opx 7px 7px;
	-webkit-border-radius:0px 0px 7px 7px;

}

.pie-pagina{
    	position: absolute;
	border: 0px solid;
	left: 2px;
	top: 1025px;
	width: 920px;
	height: 51px;
	background-color:#333333;
}*/
</style>

<?php
 }
include  '../modelo/PHPPaging.lib.php';
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);

$paging = new PHPPaging;


if (isset($_POST['orden'])){
//$pedido= $_SESSION['pedido'];

$query= " SELECT * FROM detalle_pedido where NRO_PEDIDO=".$_POST['orden']." order by NRO_ORDEN asc ";
$s=mysql_query("SELECT SUM(PRECIO) FROM detalle_pedido WHERE NRO_PEDIDO=".$_POST['orden'].";");
}

if (isset($_GET['orden'])){
$query= " SELECT * FROM detalle_pedido where NRO_PEDIDO=".$_GET['orden']." order by NRO_ORDEN asc ";
$s=mysql_query("SELECT SUM(PRECIO) FROM detalle_pedido WHERE NRO_PEDIDO=".$_GET['orden'].";");

}

$total= mysql_fetch_row($s);

echo '<script>
$(document).ready(function(){

$("#vlr").val("'.$total[0].'");
   var total= $("#vlr").val();
   var abono= $("#ab").val();
  var saldo= total-abono;
$("#sa").val(saldo);

});
</script>';

$paging->porPagina=10;
//$paging->agregarArray($pedido);
$paging->agregarConsulta($query);
$paging->div('detal');
$paging->modo('desarrollo');
$paging->verPost(true);
$paging->ejecutar();
?>
     <fieldset id="panel_detalle">
<legend><h3 align='center'>Detalle Pedido</h3></legend>
    <table class='table' id='detallep' width='650' border='0px' style="font-family: Calibri; font-size: 13px;  border-collapse: collapse;  color: '#000'">
<thead><tr>
        <th align='center'></th>
        <th align='center'><strong>PRODUCTO</strong></th>
        <th align='center'><strong>DESCRIPCIÓN</strong></th>
        <th align='center'><strong>MODELO</strong></th>
        <th align='center'><strong>COLOR</strong></th>
        <th align='center'><strong>PRECIO</strong></th>
          <th align='center'><strong>FECHA ENTREGA</strong></th>
      <th align='center'></th>
      <th align='center'></th>
	 
     </tr> </thead>
<tr><td></td>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
</tr>
<tbody id='bodyon'>
<?php $i=0; while($row=$paging->fetchResultado()){ $i++;?>
    <tr>
    <?php echo "<td class='h'>".$i."</td>";
    echo "<td class='h'>".$row['PRENDA']."</td>";
    echo "<td class='h' title='".$row["DESCRIPCION"]."'>".substr($row['DESCRIPCION'],0,30)."</td>";
    echo "<td class='h'>".$row['MODELO']."</td>";
    echo "<td class='h'>".$row['COLOR']."</td>";
    echo "<td class='h'>".$row['PRECIO']."</td>";
     echo "<td class='h'>".$row['FECHA']."</td>";
	  ?>
<td class='h'>
     	 <a href="javascript:editar(<?php echo $row['NRO_PEDIDO'].','.$row['NRO_ORDEN'] ?>)"><img src="img/page_edit.png" border="0" title="Editar esta orden"></a>

  
 </td><td class='h'>
  
	 <a href="javascript:quitar(<?php echo $row['NRO_PEDIDO'].','.$row['NRO_ORDEN'] ?>)"><img src="img/delete.png" border="0" title="Quitar esta orden"></a>
</td></tr>
  <?php } ?>
</tbody></table>
      <div id='bg' style='width:650px'>
    <table class='table' width='650px' border='0' >
    <thead>
        <tr>
      <th width='30px' class='null'> <div align='left'><a href='javascript: verDetalle();' title='Actualizar'><img  alt='preview' src='img/reload.png' style='width:18px; height:18px;'></a></div></th>
    <th colspan='14' class='null' style='color:#15428B;' align='center'>
<?php echo "<b>Navegaci&oacute;n</b>: ".$paging->fetchNavegacion(); ?>
 </th></tr></thead></table></div>
<input type='button' id='guardar' name='guardar' onclick='guardar_pedido()'  value='Guardar Pedido' />
</fieldset>
