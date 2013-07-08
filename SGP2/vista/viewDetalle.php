<?php
 include  '../modelo/PHPPaging.lib.php';
$bd='modaskuelle';
$conexion=mysql_connect('localhost','root','');
mysql_select_db($bd, $conexion);

listDetalle();
Abonos();
?>
<style>
    #tbodyon, tr:hover .h{
	background-color:#D0E3EF;
}
.tab_container{
	border: 1px solid #999;
	border-top: none;
	overflow: hidden;
	clear: both;
	float: left;
	width: 1000px;
	background: #fff;
	position:absolute;
	left: 2px;
	top: 40px;
	height:770px;
	
	-moz-border-radius:0px 0px 7px 7px;
	-webkit-border-radius:0px 0px 7px 7px;
}
        #content_wrapper{
	width:992px;
	height:825px;
	background-color:#ccc;
	margin:0px;
	padding:6px;
	overflow:hidden;
	position:absolute;
	left: 0px;
	top: 28px;

}

</style>

<?php
 function listDetalle(){

$pagin = new PHPPaging;


if (isset($_POST['orden'])){

$query= " SELECT * FROM detalle_pedido  where NRO_PEDIDO=".$_POST['orden']." order by NRO_ORDEN asc ";
$s=mysql_query("SELECT SUM(PRECIO) FROM detalle_pedido WHERE NRO_PEDIDO=".$_POST['orden'].";");
$d=mysql_query("SELECT SUM(ABONO) FROM abonos WHERE NRO_PEDIDO=".$_POST['orden'].";");
}
if (isset($_GET['orden'])){
$query= " SELECT * FROM detalle_pedido where NRO_PEDIDO=".$_GET['orden']." order by NRO_ORDEN asc ";
$s=mysql_query("SELECT SUM(PRECIO) FROM detalle_pedido WHERE NRO_PEDIDO=".$_GET['orden'].";");
$d=mysql_query("SELECT SUM(ABONO) FROM abonos WHERE NRO_PEDIDO=".$_GET['orden'].";");
}
$total= mysql_fetch_row($s);
$abono= mysql_fetch_row($d);
$saldo= $total[0]-$abono[0];
echo '<script>
$(document).ready(function(){

$("#vlr").val("'.$total[0].'");
$("#sa").val("'.$saldo.'");
$("#ab").val("'.$abono[0].'");
});
</script>';
$pagin->porPagina=5;
$pagin->agregarConsulta($query);
$pagin->div('detal');
$pagin->modo('desarrollo');
$pagin->verPost(true);
$pagin->ejecutar();
?>
<h3 align='center'>DETALLE PEDIDO</h3>
    <table class='table' id='detallep' width='900' border='0px' style="font-family: Calibri; font-size: 13px;  border-collapse: collapse;  color:'#000'; ">
<thead><tr>
   
        <th align='center'><strong>NO.</strong></th>
        <th align='center'><strong>PRODUCTO</strong></th>
        <th align='center'><strong>DESCRIPCIÓN</strong></th>
        <th align='center'><strong>MODELO</strong></th>
        <th align='center'><strong>COLOR</strong></th>
        <th align='center'><strong>PRECIO</strong></th>
          <th align='center'><strong>FECHA ENTREGA</strong></th>
           <th align='center'></th>
      <th align='center'></th>
      <th align='center'></th>
     </tr> </thead>
<tr><td></td>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
</tr>
<tbody id='bodyon'>
    
<?php $i=1; while($row=$pagin->fetchResultado()){
$pedido= $row['NRO_PEDIDO'];
$orden= $row['NRO_ORDEN'];
    echo "<tr>";
    echo "<td class='h'>".$i++."</td>";
    echo "<td class='h'>".$row['PRENDA']."</td>";
    echo "<td class='h' title='".$row["DESCRIPCION"]."'>".substr($row['DESCRIPCION'],0,30)."</td>";
    echo "<td class='h'>".$row['MODELO']."</td>";
    echo "<td class='h'>".$row['COLOR']."</td>";
    echo "<td class='h'>".$row['PRECIO']."</td>";
    echo "<td class='h'>".$row['FECHA']."</td>";
    echo "<td class='h'>";
       ?>
     	 <a href="javascript:editar(<?php echo $row['NRO_PEDIDO'].",".$row['NRO_ORDEN'] ?>)"><img src="img/page_edit.png" border="0" title="Editar esta orden"></a>

  <?php
  echo "</td ><td class='h'>";
  ?>
	 <a href="javascript:quitar(<?php echo $row['NRO_PEDIDO'].",".$row['NRO_ORDEN'] ?>)"><img src="img/delete.png" border="0" title="Quitar esta orden"></a>

  <?php
   echo "</td ><td class='h'>";
   $sql=mysql_query("select * from pedidos_asignados where NRO_PEDIDO='$pedido' and NRO_ORDEN='$orden'");
   if(mysql_fetch_array($sql)>0){
  ?>
	 <a href="javascript:asignarOp(<?php echo $row['NRO_PEDIDO'].",".$row['NRO_ORDEN'].",'".$row['PRENDA']."'" ?>)"><img src="img/asigned.png" border="0" width="17px" title="Asignar esta orden"></a>

<?php
         echo "</td></tr>";
   }
   else{
      ?>
	 <a href="javascript:asignarOp(<?php echo $row['NRO_PEDIDO'].",".$row['NRO_ORDEN'].",'".$row['PRENDA']."'" ?>)"><img src="img/Profile.png" border="0" width="17px" title="Asignar esta orden"></a>

<?php
         echo "</td></tr>";   
   }
}
?></tbody></table>
      <div id='bg' style='width:900px'>
    <table class='table' width='900px' border='0' >
    <thead>
        <tr>
    <th colspan='14' class='null' style='color:#15428B;' align='center'> 
<?php echo "<b>Navegaci&oacute;n</b>: ".$pagin->fetchNavegacion(); ?>
 </th></tr></thead></table></div>
 <?php } ?>
<!ABONOS---------------------------------------------------------------------------------!>
 <?php function Abonos(){ 
 $paging = new PHPPaging;
 
if (isset($_POST['orden'])){
$sql= " SELECT * FROM abonos where NRO_PEDIDO=".$_POST['orden']." order by FECHA_ABONO desc ";

}
if (isset($_GET['orden'])){
$sql= " SELECT * FROM abonos where NRO_PEDIDO=".$_GET['orden']." order by FECHA_ABONO desc ";
}
 
 ?>
 
<h3 align='center'>ABONOS </h3>
    <table class='table' id='detallep' width='900' border='0px' style="font-family: Calibri; font-size: 13px;  border-collapse: collapse;  color:'#000'">
<thead><tr>
        <th align='center'><strong>NO.</strong></th>
        <th align='center'><strong>FECHA ABONO</strong></th>
        <th align='center'><strong>FORMA DE PAGO</strong></th>
        <th align='center'><strong>VALOR ABONO</strong></th>
       
      <th align='center'></th>
      <th align='center'></th>
     </tr> </thead>
<tr><td></td>
<td></td><td></td><td></td><td></td>
</tr>
<tbody id='bodyon'>
<?php
$paging->porPagina=4;
$paging->agregarConsulta($sql);
$paging->div('detal');
$paging->modo('desarrollo');
$paging->verPost(true);
$paging->ejecutar();
$i=0;
while($res=$paging->fetchResultado()){
    
    $i++;
    echo"<td class='h'>".$i."</td>";
 echo"<td class='h'>".$res['FECHA_ABONO']."</td>";
    echo"<td class='h'>".$res['FORMA_PAGO']."</td>";
    echo"<td class='h'>".$res['ABONO']."</td>";
  echo("<td class='h'> <a href='javascript:editAbono(".$res['ID_ABONO'].");' title='Editar Abono'><img src='img/page_edit.png' /></a></td>");
     echo("<td class='h'><a href='javascript:quitarAbono(".$res['ID_ABONO'].");' title='Quitar Abono'><img  alt='preview' src='img/delete.png'></a></td></tr>");
}?>
</tbody></table>
      <div id='bg' style='width:900px'>
    <table class='table' width='900px' border='0' >
    <thead>
        <tr>
    <th colspan='14' class='null' style='color:#15428B;' align='center'> 
<?php echo "<b>Navegaci&oacute;n</b>: ".$paging->fetchNavegacion(); ?>
 </th></tr></thead></table></div>

<?php }?>